<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_nilai extends CI_Model
{
        // start datatables
    var $column_order = array(null, 'nama_ppdb', 'jum_nilai', 'seleksi'); //set column field database for datatable orderable
    var $column_search = array('nama_ppdb','jum_nilai','seleksi'); //set column field database for datatable searchable
    var $order = array('id_ppdb' => 'asc'); // default order
 
    private function _get_datatables_query() {
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->join('ppdb', 'ppdb.id_ppdb = nilai.ppdb_id');
        $this->db->order_by('jum_nilai','DESC');

        $i = 0;
        foreach ($this->column_search as $nilai) { // loop column
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($nilai, $_POST['search']['value']);
                } else {
                    $this->db->or_like($nilai, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables() {
        $this->_get_datatables_query();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all() {
        $this->db->from('nilai');
        return $this->db->count_all_results();
    }
    // end datatables
    public function get($id_nilai = null)
    {
        $this->db->join('ppdb', 'ppdb.id_ppdb = nilai.ppdb_id');
        if ($id_nilai != null) {
            $this->db->where('id_nilai', $id_nilai);
        }
        $this->db->order_by('jum_nilai','DESC');
        return  $this->db->get('nilai');
    }

    public function getLulus()
    {
        $this->db->where('status_ppdb', 'lulus');
        return $this->db->get('nilai');
    }

    public function getTidakLulus()
    {
        $this->db->where('status_ppdb', 'tidak lulus');
        return $this->db->get('nilai');
    }

    public function save($post)
    {
        $created_by = $this->session->userdata('id');
        $created = date('Y:m:d H:i:s');
        $params = [
            'ppdb_id' => $post['ppdb_id'],
            'jum_nilai' => $post['jum_nilai'],
            'status_ppdb' => $post['status_ppdb'],
            'created_by' => $created_by,
            'date_created' => $created
        ];
        /* echo json_encode($params); */
        /* die(); */
       $this->db->insert('nilai', $params); 
    }

    public function edit($post)
    {
        $modified_by = $this->session->userdata('id');
        $modified_created = date('Y:m:d H:i:s');
        $params = [
            'ppdb_id' => $post['ppdb_id'],
            'jum_nilai' => $post['jum_nilai'],
            'status_ppdb' => $post['status_ppdb'],
            'modified_by' => $modified_by,
            'modified_date' => $modified_created
        ];
        $this->db->where('id_nilai', $post['id_nilai']);
        $this->db->update('nilai',$params);
    }

    public function delete($id_nilai)
    {
        $this->db->where('id_nilai',$id_nilai);
        $this->db->delete('nilai');
    }

}
