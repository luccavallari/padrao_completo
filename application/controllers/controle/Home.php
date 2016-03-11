<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('html','form','url','date'));
        $this->load->library(array('form_validation','image_lib','email','upload','funcoes'));
        $this->load->model(array('model_admin'));
        if($this->session->userdata('user_logado') == "NULL" || (!$this->session->userdata('user_logado')) || $this->session->userdata('user_logado') == FALSE)
		{
			// redirect('controle/login','refresh');
    	}
    }

    function index()
    {
		// $listagemTotal = $this->model_cadastro->listaCadastros();
		// // echo "<pre>";
  // //   	print_r($listagemTotal);
  // //   	echo "</pre>";

		// $list = "";
		// foreach ($listagemTotal as $row)
		// {
		// 	// $date = new DateTime($row->sec_dtCadastro);
		// 	$list.= '<tr>';
		// 	$list.=		'<td>'.$row->cad_id.'</td>';
		// 	$list.=		'<td>'.$row->cad_nome.'</td>';
		// 	$list.=		'<td>'.$row->cad_email.'</td>';
		// 	$list.=		'<td>'.$row->cad_telefone.'</td>';
		// 	$list.=		'<td>'.$row->cad_uf.'</td>';
		// 	$list.=		'<td>'.$row->cad_cidade.'</td>';
		// 	$list.= '</tr>';
		// }

		// $dados = array(
		// 	'titulo' => ' - M Leal - Lista de Cadastro',
		// 	'listaCadastros' => $list,
		// 	// 'formCat' => array('id' => 'formCat'),
		// );

		// // $this->load->view('controle/categoria_view_controle', $dados);
		$dados['titulo'] = "Colaboradores";
		$this->load->view('controle/home_view_controle', $dados);
    }

    function upload()
    {
		$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/pictures/';//Caminho onde será salvo
		$config['upload_url'] = base_url()."pictures/";//URL da pasta de destino
		$config['allowed_types'] = 'jpg|jpeg|png|gif';//Tipos de arquivos aceito
		$config['max_size'] = '4096';//Tamanho - Aqui aceitamos até 4 Mb

		$nomeCompleto = $this->input->post('nome', TRUE);
		$nome = $this->funcoes->preparaURL($nomeCompleto);

		$config['file_name'] = $nome;

		$this->upload->initialize($config);
		$arquivo = $this->input->post('imagem', TRUE);

		if( ! $this->upload->do_upload('imagem'))
		{
			$data['msg_up'] = $this->upload->display_errors();
			$data['caminho'] = $config['upload_path'];
		}
		else
		{
			$upload_data = $this->upload->data();
			$nome_do_arquivo_gravado = $upload_data['file_name'];
			$data['msg_up'] = "OK";

			$config1['new_image']      = dirname($_SERVER["SCRIPT_FILENAME"]).'/pictures/thumb/';
			$config1['source_image']   = dirname($_SERVER["SCRIPT_FILENAME"]).'/pictures/'.$nome_do_arquivo_gravado;
			$config1['create_thumb']   = TRUE;
			$config1['maintain_ratio'] = TRUE;
			$config1['width']          = 150;
			$config1['height']         = 150;


			$this->image_lib->initialize($config1);
			if ( ! $this->image_lib->resize())
			{
				$data['msg_img'] = $this->image_lib->display_errors();
			}
			else
			{
				$data['msg_img'] = "OK";
				$imgThumb = $upload_data['raw_name'].'_thumb'.$upload_data['file_ext'];

				$fotoInsert = array(
					'fot_titulo' => $this->input->post('nome', TRUE),
					'fot_alt' => $nomeCompleto,
					'fot_arquivo' => $nome_do_arquivo_gravado,
					'fot_thumb' => $imgThumb,
				);

				$salvaComID = $this->model_galeria->salva_foto_call_id($fotoInsert);
				$data['id_foto'] = $salvaComID;
			}
		}
        // $arq = $upload_data['file_name'];
        // $this->load->view('controle/home_view_controle', $data);

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        echo json_encode($data);
    }

    function insereFoto()
    {
		$fot_titulo = $this->input->post('fot_titulo', TRUE);
    }

    function galeria()
    {
		$where = array('gal_idPai' => NULL);
		$listagemTotal = $this->model_galeria->listaGalerias($where);
		// echo "<pre>";
		// print_r($listagemTotal);
		// echo "</pre>";

		$i = 0;
		$list = '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
		foreach ($listagemTotal as $row)
		{
			$list.=	'	<div class="panel panel-default">';
			$list.= '		<div class="panel-heading" role="tab" id="heading'.$i.'">';
			$list.= '			<h4 class="panel-title">';
			$list.= '				<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$i.'" aria-expanded="false" aria-controls="collapse'.$i.'">';
			$list.= '					'.$row->gal_titulo.'';
			$list.= '				</a>';
			$list.= '			</h4>';
			$list.= '		</div>';
			$list.= '		<div id="collapse'.$i.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$i.'">';
			$list.= '			<div class="panel-body">';
			$list.= '				'.$row->gal_descricao.'';
			$list.= '				<ul style="margin-left: 20px;">';
			$where2 = array('gal_idPai' => $row->gal_id);
			$listaFilhos = $this->model_galeria->listaGalerias($where2);
			foreach ($listaFilhos as $row2)
			{
				$list.='				<li><a href="#">'.$row->gal_titulo.'</a></li>';
			}
			$list.= '				</ul>';
			$list.= '			</div>';
			$list.= '		</div>';
			$list.= '	</div>';

			$i++;
		}
		$list.= '</div>';

		$dados = array(
			'titulo' => 'Controle - Galeria',
			'listaGalerias' => $list,
		);

		$this->load->view('controle/galeria_view_controle', $dados);
    }

    function sair()
    {
    	$this->session->sess_destroy();
    	redirect('home/');
    }
}