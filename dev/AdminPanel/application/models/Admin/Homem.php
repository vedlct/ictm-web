<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Homem extends CI_Model
{
    public function insertBottomBanner() //insert Bottom Banner
    {

            $title = $this->input->post("title");
            $subTitle = $this->input->post("subTitle");
            $bannerImage = $_FILES['image']['name'];


            $this->load->library('upload');
            $config = array(
                'upload_path' => "images/homeImage/",
                'allowed_types' => "jpg|png|jpeg|gif",
                'max_size' => "1024*4",
                'overwrite' => TRUE,
                'remove_spaces' => FALSE,
                'mod_mime_fix' => FALSE,
                'file_name' => "bottomBanner".".".pathinfo($bannerImage, PATHINFO_EXTENSION),

            );
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                // if something need after image upload
            } else {
                $error = array('error' => $this->upload->display_errors());
                $che = json_encode($error);
                echo "<script>
                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/Home/bottomBanner';
                    </script>";
                return false;
            }

            $data = array(
                'bottomBannerTitle' => $title,
                'bottomBannerSubTitle' => $subTitle,
                'bottomBannerImage' => "bottomBanner".".".pathinfo($bannerImage, PATHINFO_EXTENSION),
                'insertedBy'=>$this->session->userdata('userEmail'),
                'insertedDate'=>date("Y-m-d H:i:s"),

            );

            $data = $this->security->xss_clean($data,true);
            $error=$this->db->insert('ictmhome', $data);
            if (empty($error))
            {
                return $this->db->error();
            }
            else
            {
                return $error = null;
            }
    }
    public function getHomeId() //get home id
    {
        $this->db->select('homeId');
        $query = $this->db->get('ictmhome');
        return $query->result();

    }

    public function getHomeBottomBannerdata() //get home Bottom Banner Data
    {
        $this->db->select('homeId,bottomBannerTitle,bottomBannerSubTitle,bottomBannerImage');
        $query = $this->db->get('ictmhome');
        return $query->result();

    }

    public function getHomeSqureBoxdata() //get home Squre Box Data
    {
        $this->db->select('homeId,squareBoxTitle1,squareBoxLink1,squareBoxImage2,squareBoxTitle2,squareBoxLink2,squareBoxImage3,squareBoxTitle3,squareBoxLink3,squareBoxImage4,squareBoxTitle4,squareBoxLink4,squareBoxImage5,squareBoxTitle5,squareBoxLink5,squareBoxTitle6,squareBoxLink6,squareBoxImage6,squareBoxImage7,squareBoxTitle7,squareBoxLink7,squareBoxImage8,squareBoxTitle8,squareBoxLink8');
        $query = $this->db->get('ictmhome');
        return $query->result();

    }

    public function updateBottomBanner($id) //Update home Bottom Banner Data
    {

        $title = $this->input->post("title");
        $subTitle = $this->input->post("subTitle");
        $bannerImage = $_FILES['image']['name'];

        if (!empty($_FILES['image']['name'])) {
            $this->load->library('upload');
            $config = array(
                'upload_path' => "images/homeImage/",
                'allowed_types' => "jpg|png|jpeg|gif",
                'max_size' => "1024*4",
                'overwrite' => TRUE,
                'remove_spaces'=>FALSE,
                'mod_mime_fix'=>FALSE,
                'file_name' => "bottomBanner".".".pathinfo($bannerImage, PATHINFO_EXTENSION),

            );
            $this->upload->initialize($config);

            if($this->upload->do_upload('image')){
                // if something need after image upload
            }else{
                $error =array('error'=>$this->upload->display_errors());
                $che=json_encode($error);
                echo "<script>
                    alert($che.error);
                    window.location.href= '" . base_url() . "Admin/Home/editBottomBanner/'.$id;
                    </script>";
                return false;
            }
            $data = array(
                'bottomBannerTitle' => $title,
                'bottomBannerSubTitle' => $subTitle,
                'bottomBannerImage' => "bottomBanner".".".pathinfo($bannerImage, PATHINFO_EXTENSION),
                'lastModifiedDate'=>date("Y-m-d H:i:s"),
                'lastModifiedBy'=>$this->session->userdata('userEmail'),

            );

        }
        else
        {
            $data = array(
                'bottomBannerTitle' => $title,
                'bottomBannerSubTitle' => $subTitle,
                'lastModifiedDate'=>date("Y-m-d H:i:s"),
                'lastModifiedBy'=>$this->session->userdata('userEmail'),

            );
        }

        $data = $this->security->xss_clean($data,true);
        $this->db->where('homeId', $id);
        $error=$this->db->update('ictmhome', $data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error=null;
        }

    }

    public function getHomeMiddleBannerdata() //get home Middle Banner Data
    {
        $this->db->select('homeId,middleBannerTitle1,middleBannerText1,middleBannerLink1,middleBannerTitle2,middleBannerText2,middleBannerLink2,middleBannerTitle3,middleBannerText3,middleBannerLink3');
        $query = $this->db->get('ictmhome');
        return $query->result();

    }

    public function insertMiddleBanner() //insert Middle Banner
    {

        $title1 = $this->input->post("title1");
        $title2 = $this->input->post("title2");
        $title3 = $this->input->post("title3");
        $link1 = $this->input->post("link1");
        $link2 = $this->input->post("link2");
        $link3 = $this->input->post("link3");
        $text1 = $this->input->post("text1");
        $text2 = $this->input->post("text2");
        $text3 = $this->input->post("text3");

        $data = array(
            'middleBannerTitle1' => $title1,
            'middleBannerText1' => $link1,
            'middleBannerLink1' => $text1,
            'middleBannerTitle2' => $title2,
            'middleBannerLink2' =>$link2,
            'middleBannerText2' =>$text2,
            'middleBannerTitle3' =>$title3,
            'middleBannerLink3' =>$link3,
            'middleBannerText3' =>$text3,
            'insertedBy'=>$this->session->userdata('userEmail'),
            'insertedDate'=>date("Y-m-d H:i:s"),

        );

        $data = $this->security->xss_clean($data,true);
        $error=$this->db->insert('ictmhome', $data);
        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error = null;
        }
    }

    public function updateMiddleBannerdata($id) //Update Middle Banner
    {

        $title1 = $this->input->post("title1");
        $title2 = $this->input->post("title2");
        $title3 = $this->input->post("title3");
        $link1 = $this->input->post("link1");
        $link2 = $this->input->post("link2");
        $link3 = $this->input->post("link3");
        $text1 = $this->input->post("text1");
        $text2 = $this->input->post("text2");
        $text3 = $this->input->post("text3");

        $data = array(
            'middleBannerTitle1' => $title1,
            'middleBannerText1' => $text1,
            'middleBannerLink1' => $link1,
            'middleBannerTitle2' => $title2,
            'middleBannerLink2' =>$link2,
            'middleBannerText2' =>$text2,
            'middleBannerTitle3' =>$title3,
            'middleBannerLink3' =>$link3,
            'middleBannerText3' =>$text3,
            'lastModifiedDate'=>date("Y-m-d H:i:s"),
            'lastModifiedBy'=>$this->session->userdata('userEmail'),

        );
        $data = $this->security->xss_clean($data);
        $this->db->where('homeId', $id);
        $error=$this->db->update('ictmhome', $data);
        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            return $error = null;
        }
    }

    public function insertSqureBox(){

        $title1 = $this->input->post("title1");
        $title2 = $this->input->post("title2");
        $title3 = $this->input->post("title3");
        $title4 = $this->input->post("title4");
        $title5 = $this->input->post("title5");
        $title6 = $this->input->post("title6");
        $title7 = $this->input->post("title7");
        $title8 = $this->input->post("title8");
        $link1 = $this->input->post("link1");
        $link2 = $this->input->post("link2");
        $link3 = $this->input->post("link3");
        $link4 = $this->input->post("link4");
        $link5 = $this->input->post("link5");
        $link6 = $this->input->post("link6");
        $link7 = $this->input->post("link7");
        $link8 = $this->input->post("link8");

        $squareBoxImage = $_FILES['image']['name'];

        $files = $_FILES;
        $data = array();

        for ($i = 0; $i < count($squareBoxImage); $i++) {

            if ($squareBoxImage[$i] != null) {

                $_FILES['image']['name'] = $files['image']['name'][$i];
                $_FILES['image']['type'] = $files['image']['type'][$i];
                $_FILES['image']['tmp_name'] = $files['image']['tmp_name'][$i];
                $_FILES['image']['error'] = $files['image']['error'][$i];
                $_FILES['image']['size'] = $files['image']['size'][$i];

                $this->load->library('upload');
                $this->upload->initialize($this->set_upload_options_square($i));

                if (!$this->upload->do_upload('image')) {

                    $error[$i] = $this->upload->display_errors();
                    $data[$error[$i]];
                }

            }
        }
        if (!empty($data)) {
            echo "<script>
                    alert('Some thing Went Wrong !! Please Try Again!!');
                    window.location.href= '" . base_url() . "Admin/Home/squreBox';
                    </script>";
            return false;
        } else {

            $data = array(
                'squareBoxTitle1' => $title1,
                'squareBoxLink1' => $link1,
                'squareBoxTitle2' => $title2,
                'squareBoxLink2' => $link2,
                'squareBoxImage2' => "squareBoxImage2" . "." . pathinfo($squareBoxImage[0], PATHINFO_EXTENSION),
                'squareBoxTitle3' => $title3,
                'squareBoxLink3' => $link3,
                'squareBoxImage3' => "squareBoxImage3" . "." . pathinfo($squareBoxImage[1], PATHINFO_EXTENSION),
                'squareBoxTitle4' => $title4,
                'squareBoxLink4' => $link4,
                'squareBoxImage4' => "squareBoxImage4" . "." . pathinfo($squareBoxImage[2], PATHINFO_EXTENSION),
                'squareBoxTitle5' => $title5,
                'squareBoxLink5' => $link5,
                'squareBoxImage5' => "squareBoxImage5" . "." . pathinfo($squareBoxImage[3], PATHINFO_EXTENSION),
                'squareBoxTitle6' => $title6,
                'squareBoxLink6' => $link6,
                'squareBoxImage6' => "squareBoxImage6" . "." . pathinfo($squareBoxImage[4], PATHINFO_EXTENSION),
                'squareBoxTitle7' => $title7,
                'squareBoxLink7' => $link7,
                'squareBoxImage7' => "squareBoxImage7" . "." . pathinfo($squareBoxImage[5], PATHINFO_EXTENSION),
                'squareBoxTitle8' => $title8,
                'squareBoxLink8' => $link8,
                'squareBoxImage8' => "squareBoxImage8" . "." . pathinfo($squareBoxImage[6], PATHINFO_EXTENSION),
                'insertedBy'=>$this->session->userdata('userEmail'),
                'insertedDate'=>date("Y-m-d H:i:s"),

            );

            $data = $this->security->xss_clean($data, true);
            $error = $this->db->insert('ictmhome', $data);
            if (empty($error)) {
                return $this->db->error();
            } else {
                return $error = null;
            }
        }


    }
    public function updateSqureBox($id){

        $title1 = $this->input->post("title1");
        $title2 = $this->input->post("title2");
        $title3 = $this->input->post("title3");
        $title4 = $this->input->post("title4");
        $title5 = $this->input->post("title5");
        $title6 = $this->input->post("title6");
        $title7 = $this->input->post("title7");
        $title8 = $this->input->post("title8");
        $link1 = $this->input->post("link1");
        $link2 = $this->input->post("link2");
        $link3 = $this->input->post("link3");
        $link4 = $this->input->post("link4");
        $link5 = $this->input->post("link5");
        $link6 = $this->input->post("link6");
        $link7 = $this->input->post("link7");
        $link8 = $this->input->post("link8");

        $squareBoxImage = $_FILES['image']['name'];

        $files = $_FILES;
        $data = array();

        for ($i = 0; $i < count($squareBoxImage); $i++) {

            if ($squareBoxImage[$i] != null) {

                $_FILES['image']['name'] = $files['image']['name'][$i];
                $_FILES['image']['type'] = $files['image']['type'][$i];
                $_FILES['image']['tmp_name'] = $files['image']['tmp_name'][$i];
                $_FILES['image']['error'] = $files['image']['error'][$i];
                $_FILES['image']['size'] = $files['image']['size'][$i];

                $this->load->library('upload');
                $this->upload->initialize($this->set_upload_options_square($i));

                if (!$this->upload->do_upload('image')) {

                    $error[$i] = $this->upload->display_errors();
                    $data[$error[$i]];
                }

            }
        }
        if (!empty($data)) {
            echo "<script>
                    alert('Some thing Went Wrong !! Please Try Again!!');
                    window.location.href= '" . base_url() . "Admin/Home/squreBox';
                    </script>";
            return false;
        } else {


            $data = array(
                'squareBoxTitle1' => $title1,
                'squareBoxLink1' => $link1,
                'squareBoxTitle2' => $title2,
                'squareBoxLink2' => $link2,
                'squareBoxTitle3' => $title3,
                'squareBoxLink3' => $link3,
                'squareBoxTitle4' => $title4,
                'squareBoxLink4' => $link4,
                'squareBoxTitle5' => $title5,
                'squareBoxLink5' => $link5,
                'squareBoxTitle6' => $title6,
                'squareBoxLink6' => $link6,
                'squareBoxTitle7' => $title7,
                'squareBoxLink7' => $link7,
                'squareBoxTitle8' => $title8,
                'squareBoxLink8' => $link8,
                'lastModifiedDate'=>date("Y-m-d H:i:s"),
                'lastModifiedBy'=>$this->session->userdata('userEmail'),
            );


                if ($squareBoxImage[0] != "") {

                    $data2 = array(
                        'squareBoxImage2' => "squareBoxImage2" . "." . pathinfo($squareBoxImage[0], PATHINFO_EXTENSION),
                    );
                    $newdata1 = array_merge($data, $data2) ;

                }
                else{
                    $newdata1=$data;
                }
                if ($squareBoxImage[1] != "") {

                    $data3 = array(
                        'squareBoxImage3' => "squareBoxImage3" . "." . pathinfo($squareBoxImage[1], PATHINFO_EXTENSION),
                    );
                    $newdata2 = array_merge($newdata1, $data3);

                }
                else{
                    $newdata2=$newdata1;
                }
                if ($squareBoxImage[2] != "") {

                    $data4 = array(
                        'squareBoxImage4' => "squareBoxImage4" . "." . pathinfo($squareBoxImage[2], PATHINFO_EXTENSION),
                    );
                    $newdata3 = array_merge($newdata2, $data4);

                }
                else{
                    $newdata3=$newdata2;
                }
                if ($squareBoxImage[3] != "") {

                    $data5 = array(
                        'squareBoxImage5' => "squareBoxImage5" . "." . pathinfo($squareBoxImage[3], PATHINFO_EXTENSION),
                    );
                    $newdata4 = array_merge($newdata3, $data5);

                }
                else{
                    $newdata4=$newdata3;
                }
                if ($squareBoxImage[4] != "") {

                    $data6 = array(
                        'squareBoxImage6' => "squareBoxImage6" . "." . pathinfo($squareBoxImage[4], PATHINFO_EXTENSION),
                    );
                    $newdata5 = array_merge($newdata4, $data6);

                }
                else{
                    $newdata5=$newdata4;
                }
                if ($squareBoxImage[5] != "") {

                    $data7 = array(
                        'squareBoxImage7' => "squareBoxImage7" . "." . pathinfo($squareBoxImage[5], PATHINFO_EXTENSION)
                    );
                    $newdata6 = array_merge($newdata5, $data7);

                }
                else{
                    $newdata6=$newdata5;
                }
                if ($squareBoxImage[6] != "") {

                    $data8 = array(
                        'squareBoxImage8' => "squareBoxImage8" . "." . pathinfo($squareBoxImage[6], PATHINFO_EXTENSION)
                    );
                    $newdata7 = array_merge($newdata6, $data8);

                }
                else{
                    $newdata7=$newdata6;
                }

            $dataz = $this->security->xss_clean($newdata7, true);
            $this->db->where('homeId', $id);
            $error=$this->db->update('ictmhome', $dataz);

            if (empty($error)) {
                return $this->db->error();
            } else {
                return $error = null;
            }
        }

    }
    public function getHomeVerticalBardata() //get home Vertical Bar Data
    {
        $this->db->select('homeId,verticalBarTitle1,verticalBarText1,verticalBarImage1,verticalBarLink1,verticalBarText2,verticalBarImage2,verticalBarTitle2,verticalBarLink2,verticalBarTitle3,verticalBarText3,verticalBarImage3,verticalBarLink3,verticalBarTitle4,verticalBarText4,verticalBarImage4,verticalBarLink4');
        $query = $this->db->get('ictmhome');
        return $query->result();

    }

    public function insertVerticalBar() //insert Vertical Bar
    {

        $title1 = $this->input->post("title1");
        $title2 = $this->input->post("title2");
        $title3 = $this->input->post("title3");
        $title4 = $this->input->post("title4");
        $link1 = $this->input->post("link1");
        $link2 = $this->input->post("link2");
        $link3 = $this->input->post("link3");
        $link4 = $this->input->post("link4");
        $text1 = $this->input->post("text1");
        $text2 = $this->input->post("text2");
        $text3 = $this->input->post("text3");
        $text4 = $this->input->post("text4");

        $verticalBarImage = $_FILES['image']['name'];

        $files = $_FILES;
        $data = array();

        for ($i = 0; $i < count($verticalBarImage); $i++) {

            if ($verticalBarImage[$i] != null) {

                $_FILES['image']['name'] = $files['image']['name'][$i];
                $_FILES['image']['type'] = $files['image']['type'][$i];
                $_FILES['image']['tmp_name'] = $files['image']['tmp_name'][$i];
                $_FILES['image']['error'] = $files['image']['error'][$i];
                $_FILES['image']['size'] = $files['image']['size'][$i];

                $this->load->library('upload');
                $this->upload->initialize($this->set_upload_options_vertical($i));

                if (!$this->upload->do_upload('image')) {

                    $error[$i] = $this->upload->display_errors();
                    $data[$error[$i]];
                }

            }
        }
        if (!empty($data)) {
            echo "<script>
                    alert('Some thing Went Wrong !! Please Try Again!!');
                    window.location.href= '" . base_url() . "Admin/Home/verticalBar';
                    </script>";
            return false;
        } else {

            $data1 = array(
                'verticalBarTitle1' => $title1,
                'verticalBarLink1' => $link1,
                'verticalBarText1' => $text1,
                'verticalBarTitle2' => $title2,
                'verticalBarLink2' => $link2,
                'verticalBarText2' => $text2,
                'verticalBarTitle3' => $title3,
                'verticalBarLink3' => $link3,
                'verticalBarText3' => $text3,
                'verticalBarTitle4' => $title4,
                'verticalBarLink4' => $link4,
                'verticalBarText4' => $text4,
                'insertedBy'=>$this->session->userdata('userEmail'),
                'insertedDate'=>date("Y-m-d H:i:s"),
            );

            if ($verticalBarImage[0]!="")
            {

                $data2 =array(
                    'verticalBarImage1' => "verticalBar1" . "." . pathinfo($verticalBarImage[0], PATHINFO_EXTENSION),
                );
                $newdata=array_merge($data1,$data2);

            }
            else{
                $newdata=$data1;
            }
            if ($verticalBarImage[1]!="")
            {

                $data2 =array(
                    'verticalBarImage2' => "verticalBar2" . "." . pathinfo($verticalBarImage[1], PATHINFO_EXTENSION),
                );
                $newdata2=array_merge($newdata,$data2);

            }
            else{
                $newdata2=$newdata;
            }
            if ($verticalBarImage[2]!="")
            {

                $data2 =array(
                    'verticalBarImage3' => "verticalBar3" . "." . pathinfo($verticalBarImage[2], PATHINFO_EXTENSION),
                );
                $newdata3=array_merge($newdata2,$data2);

            }
            else{
                $newdata3=$newdata2;
            }
            if ($verticalBarImage[3]!="")
            {

                $data2 =array(
                    'verticalBarImage4' => "verticalBar4" . "." . pathinfo($verticalBarImage[3], PATHINFO_EXTENSION),
                );
                $newdata4=array_merge($newdata3,$data2);

            }
            else{
                $newdata4=$newdata3;
            }


            $data = $this->security->xss_clean($newdata4, true);
            $error = $this->db->insert('ictmhome', $data);
            if (empty($error)) {
                return $this->db->error();
            } else {
                return $error = null;
            }
        }
    }

    //upload an image options
    private function set_upload_options_vertical($i)
    {

        $config = array();
        $config['upload_path'] = 'images/homeImage/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['overwrite'] = True;
        $config['file_name'] = 'verticalBar'.($i+1);

        return $config;
    }

    private function set_upload_options_square($i)
    {

        $config = array();
        $config['upload_path'] = 'images/homeImage/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['overwrite'] = True;
        $config['file_name'] = 'squareBoxImage'.($i+2);

        return $config;
    }

    public function updateVerticalBardata($id) //Update Vertical Bar
    {

        $title1 = $this->input->post("title1");
        $title2 = $this->input->post("title2");
        $title3 = $this->input->post("title3");
        $title4 = $this->input->post("title4");
        $link1 = $this->input->post("link1");
        $link2 = $this->input->post("link2");
        $link3 = $this->input->post("link3");
        $link4 = $this->input->post("link4");
        $text1 = $this->input->post("text1");
        $text2 = $this->input->post("text2");
        $text3 = $this->input->post("text3");
        $text4 = $this->input->post("text4");

        $verticalBarImage = $_FILES['image']['name'];

        $files = $_FILES;
        $data = array();

        for ($i = 0; $i < count($verticalBarImage); $i++) {

            if ($verticalBarImage[$i] != null) {

                $_FILES['image']['name'] = $files['image']['name'][$i];
                $_FILES['image']['type'] = $files['image']['type'][$i];
                $_FILES['image']['tmp_name'] = $files['image']['tmp_name'][$i];
                $_FILES['image']['error'] = $files['image']['error'][$i];
                $_FILES['image']['size'] = $files['image']['size'][$i];

                $this->load->library('upload');
                $this->upload->initialize($this->set_upload_options_vertical($i));

                if (!$this->upload->do_upload('image')) {

                    $error[$i] = $this->upload->display_errors();
                    $data[$error[$i]];
                }

            }
        }
        if (!empty($data)) {
            echo "<script>
                    alert('Some thing Went Wrong !! Please Try Again!!');
                    window.location.href= '" . base_url() . "Admin/Home/verticalBar';
                    </script>";
            return false;
        }
        else {


            $data1 = array(
                'verticalBarTitle1' => $title1,
                'verticalBarLink1' => $link1,
                'verticalBarText1' => $text1,
                'verticalBarTitle2' => $title2,
                'verticalBarLink2' => $link2,
                'verticalBarText2' => $text2,
                'verticalBarTitle3' => $title3,
                'verticalBarLink3' => $link3,
                'verticalBarText3' => $text3,
                'verticalBarTitle4' => $title4,
                'verticalBarLink4' => $link4,
                'verticalBarText4' => $text4,
                'lastModifiedDate'=>date("Y-m-d H:i:s"),
                'lastModifiedBy'=>$this->session->userdata('userEmail'),
            );

            if ($verticalBarImage[0]!="")
            {

                $data2 =array(
                    'verticalBarImage1' => "verticalBar1" . "." . pathinfo($verticalBarImage[0], PATHINFO_EXTENSION),
                );
                $newdata=array_merge($data1,$data2);

            }
            else{
                $newdata=$data1;
            }
            if ($verticalBarImage[1]!="")
            {

                $data2 =array(
                    'verticalBarImage2' => "verticalBar2" . "." . pathinfo($verticalBarImage[1], PATHINFO_EXTENSION),
                );
                $newdata2=array_merge($newdata,$data2);

            }
            else{
                $newdata2=$newdata;
            }
            if ($verticalBarImage[2]!="")
            {

                $data2 =array(
                    'verticalBarImage3' => "verticalBar3" . "." . pathinfo($verticalBarImage[2], PATHINFO_EXTENSION),
                );
                $newdata3=array_merge($newdata2,$data2);

            }
            else{
                $newdata3=$newdata2;
            }
            if ($verticalBarImage[3]!="")
            {

                $data2 =array(
                    'verticalBarImage4' => "verticalBar4" . "." . pathinfo($verticalBarImage[3], PATHINFO_EXTENSION),
                );
                $newdata4=array_merge($newdata3,$data2);

            }
            else{
                $newdata4=$newdata3;
            }

            $data = $this->security->xss_clean($newdata4, true);
            $this->db->where('homeId', $id);
            $error=$this->db->update('ictmhome', $data);
            if (empty($error)) {
                return $this->db->error();
            } else {
                return $error = null;
            }
        }
    }
    public function getHomeSliderdata() //get home Slider Data
    {
        $this->db->select('homeId,slideImage1,slideText1,slideImage2,slideText2,slideImage3,slideText3');
        $query = $this->db->get('ictmhome');
        return $query->result();

    }

    public function insertSlider() //insert Slider
    {
        $text1 = $this->input->post("text1");
        $text2 = $this->input->post("text2");
        $text3 = $this->input->post("text3");

        $sliderImage = $_FILES['image']['name'];

        $files = $_FILES;
        $data = array();

        for ($i = 0; $i < count($sliderImage); $i++) {

            if ($sliderImage[$i] != null) {

                $_FILES['image']['name'] = $files['image']['name'][$i];
                $_FILES['image']['type'] = $files['image']['type'][$i];
                $_FILES['image']['tmp_name'] = $files['image']['tmp_name'][$i];
                $_FILES['image']['error'] = $files['image']['error'][$i];
                $_FILES['image']['size'] = $files['image']['size'][$i];

                $this->load->library('upload');
                $this->upload->initialize($this->set_upload_options_Slider($i));

                if (!$this->upload->do_upload('image')) {

                    $error[$i] = $this->upload->display_errors();
                    $data[$error[$i]];
                }

            }
        }
        if (!empty($data)) {
            echo "<script>
                    alert('Some thing Went Wrong !! Please Try Again!!');
                    window.location.href= '" . base_url() . "Admin/Home/slider';
                    </script>";
            return false;
        }
        else {

            $data1 = array(
                'slideText1' => $text1,
                'slideText2' => $text2,
                'slideText3' => $text3,
                'insertedBy'=>$this->session->userdata('userEmail'),
                'insertedDate'=>date("Y-m-d H:i:s"),
            );
            if ($sliderImage[0]!="")
            {
                $data2 =array(
                    'slideImage1' => "sliderImage1" . "." . pathinfo($sliderImage[0], PATHINFO_EXTENSION),
                );
                $newdata=array_merge($data1,$data2);
            }
            else{
                $newdata=$data1;
            }
            if ($sliderImage[1]!="")
            {

                $data2 =array(
                    'slideImage2' => "sliderImage2" . "." . pathinfo($sliderImage[1], PATHINFO_EXTENSION),
                );
                $newdata2=array_merge($newdata,$data2);

            }
            else{
                $newdata2=$newdata;
            }
            if ($sliderImage[2]!="")
            {

                $data2 =array(
                    'slideImage3' => "sliderImage3" . "." . pathinfo($sliderImage[2], PATHINFO_EXTENSION),
                );
                $newdata3=array_merge($newdata2,$data2);

            }
            else{
                $newdata3=$newdata2;
            }


            $data = $this->security->xss_clean($newdata3, true);
            $error = $this->db->insert('ictmhome', $data);
            if (empty($error)) {
                return $this->db->error();
            } else {
                return $error = null;
            }
        }
    }

    //upload an image options
    private function set_upload_options_Slider($i)
    {

        $config = array();
        $config['upload_path'] = 'images/homeImage/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['overwrite'] = True;
        $config['file_name'] = 'sliderImage'.($i+1);

        return $config;
    }

    public function updateHomeSliderdata($id) //Update Slider
    {

        $text1 = $this->input->post("text1");
        $text2 = $this->input->post("text2");
        $text3 = $this->input->post("text3");

        $sliderImage = $_FILES['image']['name'];

        $files = $_FILES;
        $data = array();

        for ($i = 0; $i < count($sliderImage); $i++) {

            if ($sliderImage[$i] != null) {

                $_FILES['image']['name'] = $files['image']['name'][$i];
                $_FILES['image']['type'] = $files['image']['type'][$i];
                $_FILES['image']['tmp_name'] = $files['image']['tmp_name'][$i];
                $_FILES['image']['error'] = $files['image']['error'][$i];
                $_FILES['image']['size'] = $files['image']['size'][$i];

                $this->load->library('upload');
                $this->upload->initialize($this->set_upload_options_Slider($i));

                if (!$this->upload->do_upload('image')) {

                    $error[$i] = $this->upload->display_errors();
                    $data[$error[$i]];
                }

            }
        }
        if (!empty($data)) {
            echo "<script>
                    alert('Some thing Went Wrong !! Please Try Again!!');
                    window.location.href= '" . base_url() . "Admin/Home/slider';
                    </script>";
            return false;
        }
        else {
            $data1 = array(
                'slideText1' => $text1,
                'slideText2' => $text2,
                'slideText3' => $text3,
                'lastModifiedDate'=>date("Y-m-d H:i:s"),
                'lastModifiedBy'=>$this->session->userdata('userEmail'),
            );
            if ($sliderImage[0]!="")
            {
                $data2 =array(
                    'slideImage1' => "sliderImage1" . "." . pathinfo($sliderImage[0], PATHINFO_EXTENSION),
                );
                $newdata=array_merge($data1,$data2);

            }
            else{
                $newdata=$data1;
            }
            if ($sliderImage[1]!="")
            {
                $data2 =array(
                    'slideImage2' => "sliderImage2" . "." . pathinfo($sliderImage[1], PATHINFO_EXTENSION),
                );
                $newdata2=array_merge($newdata,$data2);

            }
            else{
                $newdata2=$newdata;
            }
            if ($sliderImage[2]!="")
            {
                $data2 =array(
                    'slideImage3' => "sliderImage3" . "." . pathinfo($sliderImage[2], PATHINFO_EXTENSION),
                );
                $newdata3=array_merge($newdata2,$data2);
            }
            else{
                $newdata3=$newdata2;
            }

            $sliderdata = $this->security->xss_clean($newdata3, true);
            $this->db->where('homeId', $id);
            $error=$this->db->update('ictmhome', $sliderdata);
            if (empty($error)) {
                return $this->db->error();
            } else {
                return $error = null;
            }
        }
    }

}