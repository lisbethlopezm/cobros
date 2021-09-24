<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *  
 * */
class Socio_model extends CI_Model
{
    /**
     *  Construtor
     */
    function __construct()
    {
        parent::__construct();
    }
    
    function obtenerSocio($idSocio)
    {
        return $this->db->get_where('socio',array('idSocio'=>$idSocio))->row_array();
    }

    function obtenerLoginSocio($idSocio)
    {

        return $this->db->get_where('socio',array('idSocio'=>$idSocio))->row_array();
    }
    
    function contarSocios()
    {
        $this->db->from('socio');
        return $this->db->count_all_results();
    }

    function contarSociosLogin($login)
    {
        $this->db->from('socio');
        $this->db->where('login',$login);
        return $this->db->count_all_results();
    }

    public function obteneridSocio($login){
        $this->db->select("idSocio");
        $this->db->from("socio");
        $this->db->where("login",$login);
        $r = $this->db->get();
        $resultado = $r->row();
        return $resultado->idSocio;             
    }
        
    function todosLosSocios()
    {
        $this->db->order_by('idSocio', 'asc');
        $this->db->Where('estado', '1');
        return $this->db->get('socio')->result_array();
    }
        
    function guardarSocio($params)
    {
        $this->db->insert('socio',$params);
        return $this->db->insert_id();
    }
    
    function modificarSocio($idSocio,$params)
    {
        $this->db->where('idSocio',$idSocio);
        return $this->db->update('socio',$params);
    }
    
    function eliminarSocio($idSocio,$estado)
    {
        $this->db->where('idSocio',$idSocio);
        return $this->db->update('socio',$estado);
    }

    function cambiarEstado($idSocio, $estado)
    {
        $this->db->set('estado', $estado , FALSE);
        $this->db->where('idSocio', $idSocio);
        $this->db->update('socio'); 
    }

    
}
