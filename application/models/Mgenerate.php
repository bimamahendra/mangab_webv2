<?php
class Mgenerate extends CI_Model {
  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function stats($nip){
  	$query = $this->db->query('SELECT matkul.NAMA_MATKUL, matkul.KELAS_MATKUL, COUNT(matkul.ID_MATKUL) AS jumlah FROM absen JOIN matkul ON absen.ID_MATKUL = matkul.ID_MATKUL WHERE matkul.NIP_DOSEN = '.$nip.' GROUP BY matkul.ID_MATKUL');
  	return $query->result();
  }

  public function getAllMatkulByNIP($nip){
  	return $this->db->where('NIP_DOSEN', $nip)->get('matkul')->result();
  }

  public function getMatkulByID($id){
  	return $this->db->where('ID_MATKUL', $id)->get('matkul')->result();
  }

  public function cekrand($rand){
  	return $this->db->query("SELECT ID_ABSEN FROM absen WHERE ID_ABSEN = '.$rand.'")->num_rows();
  }

  public function saveqr($data){
  	$query = $this->db->insert("absen",$data);
  	return TRUE;
  }

  public function cekpass($old){
  	$nip = $this->session->userdata('nip');
  	$this->db->where('PASS_DOSEN', $old);
  	$this->db->where('NIP_DOSEN', $nip);
  	$this->db->from('dosen');
  	$query = $this->db->get();
  	return $query;
  }

  public function changepass($pass){
  	$nip = $this->session->userdata('nip');
  	$this->db->query('UPDATE dosen SET PASS_DOSEN = "'.$pass.'" WHERE NIP_DOSEN = "'.$nip.'"');
  	return TRUE;
  }

}
?>