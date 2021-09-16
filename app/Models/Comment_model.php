<?php 
namespace App\Models;
use CodeIgniter\Model;
 
class Comment_model extends Model
{
    protected $table = 'tr_comment'; 
    protected $primaryKey = 'cmt_id';

    protected $allowedFields = ['cmt_pht_id', 
                                'cmt_usr_id',
                                'cmt_date',
                                'cmt_text'];

    public function getComment($id){
        $data = $this->db->table('tr_comment as a');
        $data->select('a.*, b.usr_username as "name"');
        $data->join('ms_user as b', 'a.cmt_usr_id = b.usr_id');  
        $data->where('a.cmt_pht_id', $id); 
        $data->orderBy('a.cmt_id', 'asc');
        $result = $data->get()->getResultArray();
        return $result; 
    }

}