<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
  <head>
    <?php include('head.php'); ?>
  </head>
  <!-- BEGIN BODY -->
  <!-- <body class="sidebar-light fixed-topbar theme-sltl bg-light-dark color-default dashboard"> -->
  <body class="sidebar-top fixed-topbar fixed-sidebar theme-sdtl color-primary">
    <!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <section>
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar">
        <div class="logopanel">
          <h1>
            <a href="<?php echo base_url(); ?>home/"></a>
          </h1>
        </div>
        <div class="sidebar-inner">
          <?php $this->load->view('include/menu'); ?>
        </div>
      </div>
      <!-- END SIDEBAR -->
      <div class="main-content">
        <!-- BEGIN TOPBAR -->
        <div class="topbar">
          <div class="header-left">
            <div class="topnav">
              <a class="menutoggle" href="#" data-toggle="sidebar-collapsed"><span class="menu__handle"><span>Menu</span></span></a>
              <!-- <ul class="nav nav-icons"> -->
                <!-- <li><a href="#" class="toggle-sidebar-top"><span class="icon-user-following"></span></a></li> -->
              <!-- </ul> -->
            </div>
          </div>
          <div class="header-right">
            <ul class="header-menu nav navbar-nav">
              <!-- BEGIN USER DROPDOWN -->
              <li class="dropdown" id="user-header">
                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

                  <?php
                  if (isset($this->session->userdata('cliente_autorizado')->foto) && is_file('../Mushu/assets/uploads/_clientes/foto/'.$this->session->userdata('cliente_autorizado')->foto)): ?>
                    <img class="img-sm img-circle mCS_img_loaded" src="<?php echo base_url(); ?>../Mushu/assets/uploads/_clientes/foto/<?php echo $this->session->userdata('cliente_autorizado')->foto; ?>" alt="Foto de Perfil">
                  <?php else: ?>
                    <img class="img-sm img-circle mCS_img_loaded" src="<?php echo base_url(); ?>assets/images/noprofile.jpg" alt="Sem Foto de Perfil">
                  <?php endif ?>

                <span class="username"><?php echo $this->session->userdata('cliente_autorizado')->nome; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="<?php echo base_url(); ?>Home/perfil"><i class="icon-user"></i><span>Meu Perfil</span></a>
                  </li>
                  <li>
                    <a href="<?php echo base_url(); ?>Home/senha"><i class="icon-key"></i><span>Alterar Senha</span></a>
                  </li>
                  <li>
                    <a href="<?php echo base_url(); ?>acesso/sair"><i class="icon-logout"></i><span>Sair</span></a>
                  </li>
                </ul>
              </li>
              <!-- END USER DROPDOWN -->
              <!-- CHAT BAR ICON -->
              <!-- <li id="quickview-toggle"><a href="#"><i class="icon-bubbles"></i></a></li> -->
            </ul>
          </div>
          <!-- header-right -->
        </div>
        <!-- END TOPBAR -->
        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content">
          <div class="row">
            <div class="col-lg-12" style="min-height:720px">
            <?php $this->load->view('include/botoes'); ?>