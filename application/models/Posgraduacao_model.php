<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Posgraduacao_model extends CI_Model {

  // Variáveis de instância da classe notícias - vindo do banco de dados.
  public $id;
  public $titulo;
  public $video;
  public $link;


	public function __construct(){
		parent::__construct();
	}

    public function listar_cursos(){
        $this->db->order_by('titulo','ASC');
        return $this->db->get('pos-graduacao')->result();
    }

    public function listar_curso($id){
        $this->db->from('pos-graduacao');
        $this->db->where('pos-graduacao.id',$id);
        return $this->db->get()->result();
    }

    public function conteudo_pos($id){
        $this->db->select('  pos-graduacao.id,   pos-graduacao.titulo,    pos-graduacao.link,  pos-graduacao.video ');
        $this->db->from('pos-graduacao');
        $this->db->where('id = '.$id);
        return $this->db->get()->result();
    }

    public function adicionar($titulo,  $link, $video){
        $dados['titulo'] = $titulo;
         $dados['video'] = $video;
        $dados['link'] = $link;

        return $this->db->insert('pos-graduacao',$dados);
    }

    public function remover($id){
        $this->db->where('id',$id);
        return $this->db->delete('pos-graduacao');
    }

    public function alterar($id, $titulo,  $link, $video){
        $dados['titulo'] = $titulo;
         $dados['video'] = $video;

        $dados['link'] = $link;

        $this->db->where('id',$id);
        return $this->db->update('pos-graduacao',$dados);
    }
}
