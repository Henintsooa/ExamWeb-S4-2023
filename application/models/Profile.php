<?php
class Profile extends CI_Model
{
    private $idprofile;
    private $nom;
    private $email;
    private $motdepasse;
    private $type;

    public function __construct($idprofile = null, $nom = null, $email = null, $motdepasse = null, $type = null)
    {
        $this->setIdProfile($idprofile);
        $this->setNom($nom);
        $this->setEmail($email);
        $this->setMotdepasse($motdepasse);
        $this->setType($type);
        $this->load->database(); 
    }

    public function getIdProfile()
    {
        return $this->idprofile;
    }

    public function setIdProfile($idprofile)
    {
        $this->idprofile = $idprofile;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getMotdepasse()
    {
        return $this->motdepasse;
    }

    public function setMotdepasse($motdepasse)
    {
        $this->motdepasse = $motdepasse;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getData()
    {
        $query = $this->db->get('Profile');
        $results = array();
        foreach ($query->result() as $row) {
            $profile = new Profile();
            $profile->setIdProfile($row->idprofile);
            $profile->setNom($row->nom);
            $profile->setEmail($row->email);
            $profile->setMotdepasse($row->motdepasse);
            $profile->setType($row->type);
            $results[] = $profile;
        }

        return array_reverse($results, true);
    }

    public function insertData()
    {
        $data = array(
            'idprofile' => $this->idprofile,
            'nom' => $this->nom,
            'email' => $this->email,
            'motdepasse' => $this->motdepasse,
            'type' => $this->type
        );
        $this->db->insert('Profile', $data);
        return $this->db->insert_id();
    }

    public function checkLogin($pseudo, $motdepasse)
    {
        $this->db->where('pseudo', $pseudo);
        $this->db->where('motdepasse', $motdepasse);
        $query = $this->db->get('Profile');
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $profile = new Profile($row->idprofile, $row->pseudo, $row->motdepasse, $row->privilege);
            return $profile;
        } else {
            return null;
        }
    }
}
?>
