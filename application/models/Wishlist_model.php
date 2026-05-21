<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get all wishlist items
     * @return array Array of wishlist objects
     */
    public function get_all()
    {
        $this->db->select('w.*, u.fullname as user_name, u.email as user_email, p.name as property_name_db, p.price as property_price_db');
        $this->db->from('wishlists w');
        $this->db->join('users u', 'w.user_id = u.id', 'left');
        $this->db->join('properties p', 'w.property_id = p.id', 'left');
        $this->db->order_by('w.created_at', 'DESC');
        return $this->db->get()->result();
    }

    /**
     * Get wishlist by ID
     * @param string $id Wishlist ID
     * @return object Wishlist object or null
     */
    public function get_by_id($id)
    {
        $this->db->select('w.*, u.fullname as user_name, u.email as user_email, p.name as property_name_db, p.price as property_price_db');
        $this->db->from('wishlists w');
        $this->db->join('users u', 'w.user_id = u.id', 'left');
        $this->db->join('properties p', 'w.property_id = p.id', 'left');
        $this->db->where('w.id', $id);
        return $this->db->get()->row();
    }

    /**
     * Get wishlist items for a specific user
     * @param string $user_id User ID
     * @param int $limit Optional limit
     * @param int $offset Optional offset
     * @return array Array of wishlist objects
     */
    public function get_by_user($user_id, $limit = null, $offset = 0)
    {
        $this->db->select('w.*, p.name as property_name_db, p.price as property_price_db, p.category as property_category');
        $this->db->from('wishlists w');
        $this->db->join('properties p', 'w.property_id = p.id', 'left');
        $this->db->where('w.user_id', $user_id);

        if ($limit) {
            $this->db->limit($limit, $offset);
        }

        $this->db->order_by('w.created_at', 'DESC');
        return $this->db->get()->result();
    }

    /**
     * Get wishlist items for a property
     * @param string $property_id Property ID
     * @return array Array of wishlist objects
     */
    public function get_by_property($property_id)
    {
        $this->db->select('w.*, u.fullname as user_name, u.email as user_email');
        $this->db->from('wishlists w');
        $this->db->join('users u', 'w.user_id = u.id', 'left');
        $this->db->where('w.property_id', $property_id);
        $this->db->order_by('w.created_at', 'DESC');
        return $this->db->get()->result();
    }

    /**
     * Create a new wishlist entry
     * @param array $data Wishlist data
     * @return string Inserted ID or false
     */
    public function create($data)
    {
        if ($this->db->insert('wishlists', $data)) {
            return $this->db->insert_id();
        }
        return false;
    }

    /**
     * Update wishlist entry
     * @param string $id Wishlist ID
     * @param array $data Update data
     * @return bool Update result
     */
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('wishlists', $data);
    }

    /**
     * Delete wishlist entry
     * @param string $id Wishlist ID
     * @return bool Delete result
     */
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('wishlists');
    }

    /**
     * Check if item exists in wishlist
     * @param string $user_id User ID
     * @param string $property_id Property ID
     * @return bool True if exists
     */
    public function is_wishlisted($user_id, $property_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('property_id', $property_id);
        return $this->db->count_all_results('wishlists') > 0;
    }

    /**
     * Get count of wishlist items for a user
     * @param string $user_id User ID
     * @return int Count of items
     */
    public function count_by_user($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->count_all_results('wishlists');
    }

    /**
     * Get count of wishlists for a property
     * @param string $property_id Property ID
     * @return int Count of wishlist entries
     */
    public function count_by_property($property_id)
    {
        $this->db->where('property_id', $property_id);
        return $this->db->count_all_results('wishlists');
    }

    /**
     * Remove item from wishlist (alias for delete)
     * @param string $user_id User ID
     * @param string $property_id Property ID
     * @return bool Result
     */
    public function remove_from_wishlist($user_id, $property_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('property_id', $property_id);
        return $this->db->delete('wishlists');
    }

    /**
     * Get total count of all wishlist items
     * @return int Total count
     */
    public function count_all()
    {
        return $this->db->count_all_results('wishlists');
    }

    /**
     * Get most wishlisted properties
     * @param int $limit Limit results
     * @return array Array of wishlisted properties with counts
     */
    public function get_popular_properties($limit = 10)
    {
        $this->db->select('
            w.property_id,
            w.property_name,
            w.property_image,
            w.property_price,
            w.property_location,
            COUNT(*) as wishlist_count
        ');
        $this->db->from('wishlists w');
        $this->db->group_by('w.property_id');
        $this->db->order_by('wishlist_count', 'DESC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }

    /**
     * Delete bulk wishlist items
     * @param array $ids Array of wishlist IDs
     * @return bool Delete result
     */
    public function delete_bulk($ids)
    {
        if (empty($ids)) {
            return false;
        }
        $this->db->where_in('id', $ids);
        return $this->db->delete('wishlists');
    }

    /**
     * Clear all wishlist items for a user
     * @param string $user_id User ID
     * @return bool Result
     */
    public function clear_user_wishlist($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->delete('wishlists');
    }

    /**
     * Search wishlist items
     * @param string $search Search keyword
     * @param string $user_id Optional filter by user
     * @return array Search results
     */
    public function search($search, $user_id = null)
    {
        $this->db->select('w.*, u.fullname as user_name');
        $this->db->from('wishlists w');
        $this->db->join('users u', 'w.user_id = u.id', 'left');

        $this->db->like('w.property_name', $search);
        $this->db->or_like('w.property_location', $search);
        $this->db->or_like('u.fullname', $search);

        if ($user_id) {
            $this->db->where('w.user_id', $user_id);
        }

        $this->db->order_by('w.created_at', 'DESC');
        return $this->db->get()->result();
    }
}
