<?php

function render($view, $data = '')
{
    $ci = get_instance();
    $ci->load->view('templates/header', $data);
    if ($ci->session->userdata('role_id') == '1') {
        $ci->load->view('templates/sidebar', $data);
    } else if ($ci->session->userdata('role_id') == '2') {
        $ci->load->view('templates/sidebar_supervisor', $data);
    } else if ($ci->session->userdata('role_id') == '3') {
        $ci->load->view('templates/sidebar_dokter', $data);
    } else if ($ci->session->userdata('role_id') == '4') {
        $ci->load->view('templates/sidebar_perawat', $data);
    }
    $ci->load->view('templates/topbar', $data);
    $ci->load->view($view, $data);
    $ci->load->view('templates/footer');
}

function renderBiodata($data = '')
{

    $ci = get_instance();

    $ci->load->view('templates/header', $data);
    $ci->load->view('templates/topbar', $data);
    if ($ci->session->userdata('role_id') == '2') {
        $ci->load->view('supervisor/biodata', $data);
    } else if ($ci->session->userdata('role_id') == '3') {
        $ci->load->view('dokter/biodata', $data);
    } else if ($ci->session->userdata('role_id') == '4') {
        $ci->load->view('perawat/biodata', $data);
    }
    $ci->load->view('templates/footer');
}

function checkAccess()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth/blocked');
    }
}


function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('index.php/auth');
    } else {
        $role_id = $ci->session->userdata('role_id'); //role id dari session
        $menu = $ci->uri->segment(1);
        // cari id menu berdasarkan url segmen 1
        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['menu_id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function check_access($role_id, $menu_id)
{ //untuk ceklist access menu
    $ci = get_instance();

    $result = $ci->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);

    //query cara lain
    // $ci->db->where('role_id', $role_id);
    // $ci->db->where('menu_id', $menu_id);
    // $ci->db->get('user_access_menu')

    if ($result->num_rows() > 0) {
        return "checked = 'checked'";
    }
}
