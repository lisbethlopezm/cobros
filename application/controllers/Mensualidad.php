<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Mensualidad extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mensualidad_model');
        $this->load->model('Vehiculo_model');
    } 

    function index()
    {
        $data['mensualidad'] = $this->Mensualidad_model->todasLasMensualidades();
        $this->load->view('layout/header');
        $this->load->view('mensualidad/index',$data);
        $this->load->view('layout/footer');
    }

    function insert()
    {   
        $data['vehiculo'] = $this->Vehiculo_model->todosLosvehiculos();
        $this->load->view('layout/header');
        $this->load->view('mensualidad/cobro',$data);
        $this->load->view('layout/footer');
    }  

    public function contar($login)
    {
        echo $this->Mensualidad_model->contarMensualidad($login);
    }

    function add()
    {   
        $this->formValidation();
		if($this->form_validation->run())     
        {   
            if ($this->Mensualidad_model->obtenerPagoMensualidadVehiculoMes($this->input->post('idVehiculo'),$this->sacarMes($this->input->post('mes')),$this->input->post('anio'))==0) {

                $datos = $this->datos();

                $Mensualidad_id = $this->Mensualidad_model->guardarMensualidad($datos);
                redirect('mensualidad/index');
            }else{
                $data['mensaje'] = "¡Ya se realizó el cobro para de este vehiculo el mes de ".$this->sacarMes($this->input->post('mes')).'!' ;
                $data['vehiculo'] = $this->Vehiculo_model->todosLosvehiculos();
                $this->load->view('layout/header');
                $this->load->view('mensualidad/cobro',$data);
                $this->load->view('layout/footer');
            }
        }
        else
        {            
            $data['vehiculo'] = $this->Vehiculo_model->todosLosvehiculos();
            $this->load->view('layout/header');
            $this->load->view('mensualidad/cobro');
            $this->load->view('layout/footer');
        }
    }  

    public function editar($idusuario)
    {
            $data['usuario'] = $this->Mensualidad_model->obtenerUsuario($idusuario);
            $this->load->view('layout/header');
            $this->load->view('mensualidad/edit', $data);
            $this->load->view('layout/footer');
    }
    public function edit()
    {       
            $idusuario = $this->input->post('idUsuario');
            $this->formValidation();
			if($this->form_validation->run())     
            {   
                if ($this->Mensualidad_model->obtenerIdUsuario($this->input->post('login'))==$idusuario) {

                    $datos = $this->datos();
                    $this->Mensualidad_model->modificarUsuario($idusuario,$datos);            
                    redirect('mensualidad/index');
                }else{
                    $data['usuario'] = $this->Mensualidad_model->obtenerUsuario($idusuario);
                    $data['mensaje'] = "¡El nombre de usuario Existe!";
                    $this->load->view('layout/header');
                    $this->load->view('mensualidad/edit',$data);
                    $this->load->view('layout/footer');
                }
            }
            else
            {
                $data['usuario'] = $this->Mensualidad_model->obtenerUsuario($idusuario);
                $this->load->view('layout/header');
                $this->load->view('mensualidad/edit', $data);
                $this->load->view('layout/footer');
            }
    } 

    function remove($idusuario)
    {
        $usuario = $this->Mensualidad_model->get_usuario($idusuario);

        // check if the usuario exists before trying to delete it
        if(isset($usuario['idusuario']))
        {
            $this->Mensualidad_model->delete_usuario($idusuario);
            redirect('mensualidad/index');
        }
    }

    public function formValidation()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('idVehiculo','Placa','required');
        $this->form_validation->set_rules('monto','Monto','required|numeric');
    }

    public function datos()
    {
        $params = array(
           'idVehiculo' => $this->input->post('idVehiculo'),
           'monto' => $this->input->post('monto'),
           'mes' => $this->sacarMes($this->input->post('mes')),
           'anio' => $this->input->post('anio'),
           'idUsuario' => $this->session->userdata('s_idUsuario'),
        );
        return $params;
    }

    public function subirImagen(){
        $config['upload_path'] = './fotos/usuarios/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';

        $this->load->library('upload',$config);

        if (!$this->upload->do_upload("archivo")) {
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
           } else {

            $file_info = $this->upload->data();
            $imagen = $file_info['file_name'];
            $data['imagen'] = $imagen;
            
            return $imagen;
        }
    }

    public function cambiarEstado($idUsuario, $estado)
    {
        $cambio = $this->Mensualidad_model->cambiarEstado($idUsuario,$estado);
        $data['usuario'] = $this->Mensualidad_model->todosLosUsuarios();
        //print_r($data);
        $this->load->view('layout/header');
        $this->load->view('mensualidad/index', $data);
        $this->load->view('layout/footer');

    }

    public function sacarMes($mes)
    {
        $mes1 = '';
        switch ($mes) {
            case "01": $mes1="Enero";
                   break;
            case "02": $mes1="Febrero";
                   break;
            case "03": $mes1="Marzo";
                   break;
            case "04": $mes1="Abril";
                   break;
            case "05": $mes1="Mayo";
                   break;
            case "06": $mes1="Junio";
                   break;
            case "07": $mes1="Julio";
                   break;
            case "08": $mes1="Agosto";
                   break;
            case "09": $mes1="Septiembre";
                   break;
            case "10": $mes1="Octubre";
                   break;
            case "11": $mes1="Noviembre";
                   break;
            case "12": $mes1="Diciembre";
                   break;
        }
        return $mes1;
    }
    
}
