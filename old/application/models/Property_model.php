<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all($status = null)
    {
        if ($status) {
            $this->db->where('status', $status);
        }
        return $this->db->get('properties')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('properties', array('id' => $id))->row();
    }

    public function create($data)
    {
        $this->db->insert('properties', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('properties', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('properties');
    }

    public function slug_exists($slug, $exclude_id = null)
    {
        $this->db->where('slug', $slug);
        if ($exclude_id !== null) {
            $this->db->where('id !=', $exclude_id);
        }
        return $this->db->count_all_results('properties') > 0;
    }

    public function count_all($status = null)
    {
        if ($status) {
            $this->db->where('status', $status);
        }
        return $this->db->count_all_results('properties');
    }

    public function search($filters = array())
    {
        if (isset($filters['category']) && !empty($filters['category'])) {
            $this->db->where('category', $filters['category']);
        }
        if (isset($filters['city']) && !empty($filters['city'])) {
            $this->db->where('city', $filters['city']);
        }
        if (isset($filters['location']) && !empty($filters['location'])) {
            $this->db->where('location', $filters['location']);
        }
        if (isset($filters['min_price']) && !empty($filters['min_price'])) {
            $this->db->where('price >=', $filters['min_price']);
        }
        if (isset($filters['max_price']) && !empty($filters['max_price'])) {
            $this->db->where('price <=', $filters['max_price']);
        }
        if (isset($filters['is_featured']) && $filters['is_featured'] == 1) {
            $this->db->where('is_featured', 1);
        }
        if (isset($filters['is_latest']) && $filters['is_latest'] == 1) {
            $this->db->where('is_latest', 1);
        }
        if (isset($filters['type']) && !empty($filters['type'])) {
            $this->db->where('type', $filters['type']);
        }
        // Status (default active)
        if (isset($filters['status']) && !empty($filters['status'])) {
            $this->db->where('status', $filters['status']);
        } else {
            $this->db->where('status', 'active');
        }
        
        // Sorting
        if (isset($filters['sort_by'])) {
            switch($filters['sort_by']) {
                case 'newest':
                    $this->db->order_by('created_at', 'DESC');
                    break;
                case 'oldest':
                    $this->db->order_by('created_at', 'ASC');
                    break;
                case 'featured':
                    $this->db->order_by('is_featured', 'DESC');
                    $this->db->order_by('created_at', 'DESC');
                    break;
                case 'price_low':
                    $this->db->order_by('price', 'ASC');
                    break;
                case 'price_high':
                    $this->db->order_by('price', 'DESC');
                    break;
                case 'latest':
                    $this->db->order_by('is_latest', 'DESC');
                    $this->db->order_by('created_at', 'DESC');
                    break;
                default:
                    $this->db->order_by('created_at', 'DESC');
            }
        } else {
            $this->db->order_by('created_at', 'DESC');
        }
        // Pagination (optional)
        if (isset($filters['limit']) && (int)$filters['limit'] > 0) {
            $offset = isset($filters['offset']) ? (int)$filters['offset'] : 0;
            $this->db->limit((int)$filters['limit'], max(0, $offset));
        }

        return $this->db->get('properties')->result();
    }

    public function get_categories()
    {
        $this->db->select('category');
        $this->db->distinct();
        $this->db->where('status', 'active');
        $this->db->order_by('category', 'ASC');
        return $this->db->get('properties')->result();
    }

    public function get_latest_for_sale($limit = 3)
    {
        $this->db->where('status', 'active');   
        $this->db->where('is_latest', 1);   
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        return $this->db->get('properties')->result();
    } 
    public function get_featured_properties($limit = 3)
    {
        $this->db->where('status', 'active');
        $this->db->where('is_featured', 1);
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        return $this->db->get('properties')->result();
    }

    public function get_cities_with_property_count($limit = 6)
    {
        $this->db->select('city, COUNT(*) as property_count, MIN(main_image) as sample_image');
        $this->db->from('properties');
        $this->db->where('status', 'active');
        $this->db->group_by('city');
        $this->db->order_by('property_count', 'DESC');
        $this->db->order_by('city', 'ASC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }
}

