<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mensualidad_model extends CI_Model
{
    /**
     *  Construtor
     */
    function __construct()
    {
        parent::__construct();
    }
    
    function obtenerMensualidad($idMensualidad)
    {
        return $this->db->get_where('mensualidad',array('idMensualidad'=>$idMensualidad))->row_array();
    }

    function obtenerPagoMensualidadVehiculoMes($idVehiculo, $mes, $anio)
    {
        $this->db->select("idMensualidad");
        $this->db->from("mensualidad");
        $this->db->where("idVehiculo",$idVehiculo);
        $this->db->where("mes",$mes);
        $this->db->where("anio",$anio);
        $resultado = $this->db->get();
        $r = $resultado->row();
        if ($resultado->num_rows() > 1) {
            return $r->idMensualidad;
        }else{
            return 0;
        }
    }
    
    function contarMensualidad()
    {
        $this->db->from('mensualidad');
        return $this->db->count_all_results();
    }

    function contarMensualidadsLogin($login)
    {
        $this->db->from('mensualidad');
        $this->db->where('login',$login);
        return $this->db->count_all_results();
    }

    public function obteneridMensualidad($login){
        $this->db->select("idMensualidad");
        $this->db->from("mensualidad");
        $this->db->where("login",$login);
        $r = $this->db->get();
        $resultado = $r->row();
        return $resultado->idMensualidad;             
    }
        
    function todasLasMensualidades()
    {
        $this->db->order_by('idMensualidad', 'asc');
        $this->db->Where('estado', '1');
        return $this->db->get('mensualidad')->result_array();
    }
        
    function guardarMensualidad($params)
    {
        $this->db->insert('mensualidad',$params);
        return $this->db->insert_id();
    }
    
    function modificarMensualidad($idMensualidad,$params)
    {
        $this->db->where('idMensualidad',$idMensualidad);
        return $this->db->update('mensualidad',$params);
    }
    
    function eliminarMensualidad($idMensualidad, $estado)
    {
        $this->db->set('estado', $estado , FALSE);
        $this->db->where('idMensualidad', $idMensualidad);
        $this->db->update('mensualidad'); 
    }

    
}

