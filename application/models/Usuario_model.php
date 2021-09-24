<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model
{
    /**
     *  Construtor
     */
    function __construct()
    {
        parent::__construct();
    }
    
    function obtenerUsuario($idusuario)
    {
        return $this->db->get_where('usuario',array('idusuario'=>$idusuario))->row_array();
    }

    function obtenerLoginUsuario($idusuario)
    {

        return $this->db->get_where('usuario',array('idusuario'=>$idusuario))->row_array();
    }
    
    function contarUsuarios()
    {
        $this->db->from('usuario');
        return $this->db->count_all_results();
    }

    function contarUsuariosLogin($login)
    {
        $this->db->from('usuario');
        $this->db->where('login',$login);
        return $this->db->count_all_results();
    }

    public function obtenerIdUsuario($login){
        $this->db->select("idUsuario");
        $this->db->from("usuario");
        $this->db->where("login",$login);
        $r = $this->db->get();
        $resultado = $r->row();
        return $resultado->idUsuario;             
    }
        
    function todosLosUsuarios()
    {
        $this->db->order_by('idusuario', 'desc');
        return $this->db->get('usuario')->result_array();
    }
        
    function guardarUsuario($params)
    {
        $this->db->insert('usuario',$params);
        return $this->db->insert_id();
    }
    
    function modificarUsuario($idusuario,$params)
    {
        $this->db->where('idusuario',$idusuario);
        return $this->db->update('usuario',$params);
    }
    
    function eliminarUsuario($idusuario,$params)
    {
        $this->db->where('idusuario',$idusuario);
        return $this->db->update('usuario',$params);
    }

    function cambiarEstado($idUsuario, $estado)
    {
        $this->db->set('estado', $estado , FALSE);
        $this->db->where('idUsuario', $idUsuario);
        $this->db->update('usuario'); 
    }

    public function ingresar($user,$psw){
        $this->db->select('idUsuario, nombre, primerApellido, usuario, contrasenia, idRol,foto');
        $this->db->FROM('usuario');
        $this->db->WHERE('usuario', $user);
        $this->db->WHERE('contrasenia', $psw);
        $this->db->WHERE('estado', 1);
        $resultado = $this->db->get();
        if ($resultado->num_rows() == 1) {
            $r = $resultado->row();
            $this->db->select('idRol, nombreRol');
            $this->db->FROM('rol');
            $this->db->WHERE('idRol', $r->idRol);
            $resultadoRol = $this->db->get();
            if ($resultadoRol->num_rows() == 1) {
                $rRol = $resultadoRol->row();
                $rol = $rRol->nombreRol;
            }else{
                $rol = 'Desconocido';
            }
            echo $rol;
            $s_user = array(
                's_idUsuario' => $r->idUsuario,
                's_nombre' => $r->nombre.' '.$r->primerApellido,
                's_foto' => $r->foto,
                's_idUsuario' => $r->idUsuario,
                's_rol' => $rol,
                's_logueado' => TRUE
            );
            $this->session->set_userdata($s_user);
            return 1;
        }
    }
}
