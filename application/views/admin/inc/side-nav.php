<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
		<img src="<?php echo base_url('uploads/admin/').$this->session->userdata('admin_image')?>" class="img-reponsive" style="width:60px;" alt="profile">
    </a>
    <div class="sidebar-toggler not-active"><span></span><span></span><span></span></div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item">
        <a href="<?php echo base_url('dashboard'); ?>" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      
      	<li class="nav-item nav-category">Leads</li>
			<li class="nav-item">
				<a href="<?php echo base_url('admin/visa-leads')?>" class="nav-link">
					<i class="link-icon" data-feather="server"></i><span class="link-title">Visa Application Leads</span>
				</a>
			</li>
      
      	<li class="nav-item nav-category">Passport Applications</li>
			<li class="nav-item">
				<a href="<?php echo base_url('admin/transaction-details')?>" class="nav-link">
					<i class="link-icon" data-feather="server"></i><span class="link-title">Customer Applications</span>
				</a>
			</li>
      <li class="nav-item nav-category">web apps</li>
     
	
      <li class="nav-item">
        <a href="<?php echo base_url('listing/faq')?>" class="nav-link">
          <i class="link-icon" data-feather="image"></i><span class="link-title">FAQs Setting</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url('listing/category')?>" class="nav-link">
          <i class="link-icon" data-feather="image"></i><span class="link-title">Category Setting</span>
        </a>
      </li>
      
        <li class="nav-item">
        <a href="<?php echo base_url('listing/plans')?>" class="nav-link">
          <i class="link-icon" data-feather="image"></i><span class="link-title">Plan Setting</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="<?php echo base_url('edit/settings/1')?>" class="nav-link">
          <i class="link-icon" data-feather="globe"></i><span class="link-title">Website Settings</span>
        </a>
      </li>
       <li class="nav-item">
        <a href="<?php echo base_url('edit/hompage_settings/1')?>" class="nav-link">
          <i class="link-icon" data-feather="globe"></i><span class="link-title">Homepage Settings</span>
        </a>
      </li>
       <li class="nav-item nav-category">FAQ`s PAGE</li>
     
	
      <li class="nav-item">
        <a href="<?php echo base_url('listing/faq')?>" class="nav-link">
          <i class="link-icon" data-feather="image"></i><span class="link-title">FAQs </span>
        </a>
      </li>
        <li class="nav-item nav-category">ABOUT US PAGE</li>
      <li class="nav-item">
        <a href="<?php echo base_url('edit/about_us/1')?>" class="nav-link">
          <i class="link-icon" data-feather="globe"></i><span class="link-title">About us Settings</span>
        </a>
      </li>
       <li class="nav-item nav-category">PASSPORT SUB PAGE SETTINGS</li>
      <li class="nav-item">
        <a href="<?php echo base_url('edit/renewal_passport/1')?>" class="nav-link">
          <i class="link-icon" data-feather="globe"></i><span class="link-title">Renewal Passports </span>
        </a>
      </li>

      <li class="nav-item">
        <a href="<?php echo base_url('edit/new_passport/1')?>" class="nav-link">
          <i class="link-icon" data-feather="globe"></i><span class="link-title">New Passports </span>
        </a>
      </li>

      <li class="nav-item">
        <a href="<?php echo base_url('edit/lost_passport/1')?>" class="nav-link">
          <i class="link-icon" data-feather="globe"></i><span class="link-title">Lost Passports </span>
        </a>
      </li>

      <li class="nav-item">
        <a href="<?php echo base_url('edit/minor_passport/1')?>" class="nav-link">
          <i class="link-icon" data-feather="globe"></i><span class="link-title">Minor Passports </span>
        </a>
      </li>

      <li class="nav-item">
        <a href="<?php echo base_url('edit/data_correction_passport/1')?>" class="nav-link">
          <i class="link-icon" data-feather="globe"></i><span class="link-title">Data Correction Passports </span>
        </a>
      </li>

      <li class="nav-item">
        <a href="<?php echo base_url('edit/second_additional_passport/1')?>" class="nav-link">
          <i class="link-icon" data-feather="globe"></i><span class="link-title">Additional Passports </span>
        </a>
      </li>

      <li class="nav-item">
        <a href="<?php echo base_url('edit/second_additional_renewal_passport/1')?>" class="nav-link">
          <i class="link-icon" data-feather="globe"></i><span class="link-title">Additional Renewal <br> Passports </span>
        </a>
      </li>
     
    </ul>
  </div>
</nav>
