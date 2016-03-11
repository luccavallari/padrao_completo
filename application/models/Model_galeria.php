<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_galerias extends CI_Model
{
    private $tabela= "tb_galerias";

  //   public function salvaFotoCallId($dadosFoto)
  //   {
		// $this->db->insert($this->tbFotos, $dadosFoto);
		// return $this->db->insert_id();
  //   }

    public function buscar($where = NULL)
    {
        try
        {
            if($where != NULL)
            {
                $resultado = $this->db->get_where($this->tabela, $where)->result();
                if($resultado->num_rows() == 0)
                {
                    return NULL;
                }
                else
                {
                    return $resultado;
                }
            }
            else
                return $this->db->get($this->tabela)->result();
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }

    public function inserir($galeria)
    {
        try
        {
            $this->db->insert($this->tabela, $galeria);
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }

    public function atualizar($where, $galeria)
    {
		try
		{
			$this->db->where('gal_id', $where)->update($this->tabela);
			return TRUE;
		}
		catch(PDOException $e)
		{
			return $e->getMessage();
		}
    }

    public function excluir($where)
    {
        try
        {
            $this->db->delete($this->tabela, $where);
            return TRUE;
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }
}