<?php 
namespace App\Models;
use CodeIgniter\Model;
 
class Photo_model extends Model
{
    protected $table = 'ms_photo'; 
    protected $primaryKey = 'pht_id';

    protected $allowedFields = ['pht_usr_id', 
                                'pht_description',
                                'pht_date',
                                'pht_image',
                                'pht_lke_status',
                                'pht_cmn_status',
                                'pht_private',
                                'pht_status'];
    
	public function getPhoto($id)
    {   
        $data = $this->db->table('ms_photo as a');
        $data->select('a.*, count(b.lke_id) as "like"'); 
        $data->join('tr_like as b', 'a.pht_id = b.lke_pht_id', 'left');  
        $data->where('a.pht_usr_id', $id);
        $data->groupBy('a.pht_id');
        $result = $data->get()->getResultArray();
        return $result; 
    }

    public function getAllPhoto($id)
    { 
        $data = $this->db->table('ms_photo as a');
        $data->select('a.*, b.usr_nama, c.lke_id, count(d.lke_id) as "like"'); 
        $data->join('ms_user as b', 'a.pht_usr_id = b.usr_id');
        $data->join('tr_like as c', 'a.pht_id = c.lke_pht_id and c.lke_usr_id = '.$id, 'left');
        $data->join('tr_like as d', 'a.pht_id = d.lke_pht_id', 'left');  
        // $data->join('ms_comment as d', 'a.pht_usr_id = b.usr_id');
        $data->orderBy('rand()');
        $data->groupBy('a.pht_id');
        $result = $data->get()->getResultArray();
        return $result; 
    }
}