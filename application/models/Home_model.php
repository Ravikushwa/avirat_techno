<?php

class Home_model extends CI_Model {

	public function __construct(){

	$this->load->database();

	}



	public function insert_data($table,$data){

		$que = $this->db->insert_string($table,$data);

		$this->db->query($que);

		$id=$this->db->insert_id();

		if($id) { return $id; } else { return false; }

	}

	// function for insert record end

    public function insert_batch($table,$data)

    {

          $this->db->insert_batch($table, $data);



    }

      public function table_truncate($table)

    {

          $query = $this->db->truncate($table);

          if($query) { return true; } else { return false; }

    }

    

	// function for update record start 

	public function update_data($table,$data,$where)

	{

		$this->db->where($where);

		$rs=$this->db->update($table,$data);

		if($rs) { return true; } else { return false; } 

	}

	// function for update record end



	// function for delete record  start

	public function delete_data($table,$where)

	{

		$rs=$this->db->delete($table,$where);

		if($rs) { return true; } else { return false; } 

	}

	// function for delete record end 



	// function for single record start

	public function fetch_condrecordwithfield($tbname,$data,$fname)

	{

		$this->db->where($data);

		$this->db->select($fname);

		$query = $this->db->get($tbname);

		if($query->num_rows() > 0)

		{

			$row = $query->row_array();

			return $row;

		}

		else { return false; }

	}



		public function fetch_record_orderby($table,$orderby)

        {

            $this->db->select("*");

            if($orderby !='')

            {

                $this->db->order_by($orderby,'DESC');

            }

            $data = $this->db->get($table);

            $get_data = $data->result_array();

            if($get_data)

            {

                return $get_data;

            }

            else

            {

                return false;

            }

        }

		

    	public function fetch_allrecord_wherecondition($table,$orderby,$where,$select)

        {

            if($orderby !='')

            {

                $this->db->order_by($orderby,'DESC');

            }

            $this->db->select($select);

            if($where !='')

            {

                $this->db->where($where);

            }

            $data = $this->db->get($table);

            $get_data = $data->result_array();

            if($get_data)

            {

                return $get_data;

            }

            else

            {

                return false;

            }

        }



        public function fetch_allrecord_wherecondition_limit($table,$orderby,$where,$select,$limit="")

        {

            if($orderby !='')

            {

                $this->db->order_by($orderby,'ASC');

            }

            $this->db->select($select);

            if($limit !='')

            {

            $this->db->limit($limit);

            } 

            $this->db->where($where);

            $data = $this->db->get($table);

            $get_data = $data->result_array();

            if($get_data)

            {

                return $get_data;

            }

            else

            {

                return false;

            }

        }



       

     

}  

?>