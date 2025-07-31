<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Akreditasi_Model extends CI_Model
{



    //////////////// KOMPONEN FUNCTION ///////////////

    public function getAkreditasiKomponen()
    {
        $this->db->select('akreditasikm.*,kategori.*');
        $this->db->join('kategori', 'kategori.kategori_id = akreditasikm.kategori_id');
        $this->db->where('kategori.jenis_kategori', 'Komponen');
        $this->db->from('akreditasikm');
        return $this->db->get()->result();
    }
    public function getKategoriKomponen()
    {
        $this->db->where('jenis_kategori', 'Komponen');
        return $this->db->get('kategori')->result();
    }

    ///////////////// END KOMPONEN FUNCTION ///////////////






    /////////////////// SARANA DAN PRASARANA FUNCTION ///////////////

    public function getAkreditasiSaranaPrasarana()
    {
        $this->db->select('akreditasikm.*,kategori.*');
        $this->db->join('kategori', 'kategori.kategori_id = akreditasikm.kategori_id');
        $this->db->where('kategori.jenis_kategori', 'Sarana Prasarana');
        $this->db->from('akreditasikm');
        return $this->db->get()->result();
    }


    public function getKategoriSaranaPrasarana()
    {
        $this->db->where('jenis_kategori', 'Sarana Prasarana');
        return $this->db->get('kategori')->result();
    }
    ////////////////////////////// END SARANA DAN PRASARANA FUNCTION //////////////////////





    //////////////////////////// PROGRAM PERPUSTAKAAN FUNCTION //////////////////////
    public function getAkreditasiProgramPrespustakaan()
    {
        $this->db->select('akreditasikm.*,kategori.*');
        $this->db->join('kategori', 'kategori.kategori_id = akreditasikm.kategori_id');
        $this->db->where('kategori.jenis_kategori', 'Program Perpustakaan');
        $this->db->from('akreditasikm');
        return $this->db->get()->result();
    }

    public function getKategoriProgramPerpustakaan()
    {
        $this->db->where('jenis_kategori', 'Program Perpustakaan');
        return $this->db->get('kategori')->result();
    }

    //////////////////////////// END PROGRAM PERPUSTAKAAN FUNCTION //////////////////////







    //////////////////////////// PLEYANAN FUNCTION //////////////////////
    public function getAkreditasiPelayanan()
    {
        $this->db->select('akreditasikm.*,kategori.*');
        $this->db->join('kategori', 'kategori.kategori_id = akreditasikm.kategori_id');
        $this->db->where('kategori.jenis_kategori', 'Pelayanan');
        $this->db->from('akreditasikm');
        return $this->db->get()->result();
    }

    public function getKategoriPelayanan()
    {
        $this->db->where('jenis_kategori', 'Pelayanan');
        return $this->db->get('kategori')->result();
    }

    ////////////////////////////////// END PLEYANAN FUNCTION //////////////////////













    ////////////////////////////////// TENAGA FUNCTION //////////////////////
    public function getAkreditasiTenaga()
    {
        $this->db->select('akreditasikm.*,kategori.*');
        $this->db->join('kategori', 'kategori.kategori_id = akreditasikm.kategori_id');
        $this->db->where('kategori.jenis_kategori', 'Tenaga');
        $this->db->from('akreditasikm');
        return $this->db->get()->result();
    }
    public function getKategoriTenaga()
    {
        $this->db->where('jenis_kategori', 'Tenaga');
        return $this->db->get('kategori')->result();
    }

    ///////////////////////// END TENAGA FUNCTION //////////////////////











    ////////////////////////////////////// PENGELOLAAN PERPUSTAKAAN FUNCTION //////////////////////

    public function getAkreditasiPengelolaan()
    {
        $this->db->select('akreditasikm.*,kategori.*');
        $this->db->join('kategori', 'kategori.kategori_id = akreditasikm.kategori_id');
        $this->db->where('kategori.jenis_kategori', 'Pengelolaan');
        $this->db->from('akreditasikm');
        return $this->db->get()->result();
    }

    public function getKategoriPengelolaan()
    {
        $this->db->where('jenis_kategori', 'Pengelolaan');
        return $this->db->get('kategori')->result();
    }

    ////////////////////////////////////// END PENGELOLAAN PERPUSTAKAAN FUNCTION //////////////////////










    //////////////////////////////// INOVASI DAN KREATIVITAS FUNCTION //////////////////////
    public function getAkreditasiInovasiKreativitas()
    {
        $this->db->select('akreditasikm.*,kategori.*');
        $this->db->join('kategori', 'kategori.kategori_id = akreditasikm.kategori_id');
        $this->db->where('kategori.jenis_kategori', 'Inovasi Dan Kreativitas');
        $this->db->from('akreditasikm');
        return $this->db->get()->result();
    }
    public function getKategoriInovasiKreativitas()
    {
        $this->db->where('jenis_kategori', 'Inovasi Dan Kreativitas');
        return $this->db->get('kategori')->result();
    }

    ///////////////////////////////// END INOVASI DAN KREATIVITAS FUNCTION //////////////////////






    ///////////////////////// STRUKTUR ORGANISASI FUNCTION //////////////////////
    public function getAkreditasiStrukturOrganisasi()
    {
        $this->db->select('akreditasikm.*,kategori.*');
        $this->db->join('kategori', 'kategori.kategori_id = akreditasikm.kategori_id');
        $this->db->where('kategori.jenis_kategori', 'Struktur Organisasi');
        $this->db->from('akreditasikm');
        return $this->db->get()->result();
    }

    public function getKategoriStrukturOrganisasi()
    {
        $this->db->where('jenis_kategori', 'Struktur Organisasi');
        return $this->db->get('kategori')->result();
    }


    ///////////////////////// END STRUKTUR ORGANISASI FUNCTION ///////////////////////






    /////////////////////////////// TINGKAT KEGEMARAN MEMBACA FUNCTION //////////////////////
    public function getAkreditasiTingkatKegemaranMembaca()
    {
        $this->db->select('akreditasikm.*,kategori.*');
        $this->db->join('kategori', 'kategori.kategori_id = akreditasikm.kategori_id');
        $this->db->where('kategori.jenis_kategori', 'Tingkat Kegemaran Membaca');
        $this->db->from('akreditasikm');
        return $this->db->get()->result();
    }

    public function getKategoriTingkatKegemaranMembaca()
    {
        $this->db->where('jenis_kategori', 'Tingkat Kegemaran Membaca');
        return $this->db->get('kategori')->result();
    }
    //////////////////////////////////////////// END TINGKAT KEGEMARAN MEMBACA FUNCTION ///////////////////////




    ///////////////////////////////////// PENDIRIAN PERPUSTAKAAN FUNCTION ///////////////////////
    public function getAkreditasiPendirian()
    {
        $this->db->select('akreditasikm.*,kategori.*');
        $this->db->join('kategori', 'kategori.kategori_id = akreditasikm.kategori_id');
        $this->db->where('kategori.jenis_kategori', 'Pendirian');
        $this->db->from('akreditasikm');
        return $this->db->get()->result();
    }
    public function getKategoriPendirianPerpustakaan()
    {
        $this->db->where('jenis_kategori', 'Pendirian');
        return $this->db->get('kategori')->result();
    }
    ///////////////////////////////////// END PENDIRIAN PERPUSTAKAAN FUNCTION ///////////////////////




    ///////////////////////////////////// PENDIRIAN PERPUSTAKAAN FUNCTION ///////////////////////
    public function getAkreditasiPencantumanNPP()
    {
        $this->db->select('akreditasikm.*,kategori.*');
        $this->db->join('kategori', 'kategori.kategori_id = akreditasikm.kategori_id');
        $this->db->where('kategori.jenis_kategori', 'Pencantuman NPP');
        $this->db->from('akreditasikm');
        return $this->db->get()->result();
    }
    public function getKategoriPencantumanNPP()
    {
        $this->db->where('jenis_kategori', 'Pencantuman NPP');
        return $this->db->get('kategori')->result();
    }
    ///////////////////////////////////// END PENDIRIAN PERPUSTAKAAN FUNCTION ///////////////////////




    ///////////////////////////////////// INDEKS PEMBANGUNAN LITERASI SEKOLAH FUNCTION ///////////////////////
    public function getAkreditasiIndeksPembangunanLiterasiSekolah()
    {
        $this->db->select('akreditasikm.*,kategori.*');
        $this->db->join('kategori', 'kategori.kategori_id = akreditasikm.kategori_id');
        $this->db->where('kategori.jenis_kategori', 'Indeks Literasi');
        $this->db->from('akreditasikm');
        return $this->db->get()->result();
    }
    public function getKategoriIndeksPembangunanLiterasiSekolah()
    {
        $this->db->where('jenis_kategori', 'Indeks Literasi');
        return $this->db->get('kategori')->result();
    }
    ///////////////////////////////////// END INDEKS PEMBANGUNAN LITERASI SEKOLAH FUNCTION ///////////////////////










    /////////////// MAIN FUNCTION ///////////////
    public function addAkreditasi($data)
    {
        return $this->db->insert('akreditasikm', $data);
    }

    public function deleteAkreditasi($id)
    {
        $this->db->where('komponen_id', $id);
        return $this->db->delete('akreditasikm');
    }

    public function editAkreditasi($id, $data)
    {
        $this->db->where('komponen_id', $id);
        return $this->db->update('akreditasikm', $data);
    }



    public function getAkreditasiById($id)
    {
        $this->db->select('akreditasikm.*,kategori.*');
        $this->db->join('kategori', 'kategori.kategori_id = akreditasikm.kategori_id');
        $this->db->where('akreditasikm.komponen_id', $id);
        $this->db->from('akreditasikm');
        return $this->db->get()->row();
    }

    ///////////////// END MAIN FUNCTION ///////////////




}

/* End of file Akreditasi_Model.php */
