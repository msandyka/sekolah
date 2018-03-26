	$(function () {
	    $('.example2').DataTable({
	      'paging'      : true,
	      'lengthChange': false,
	      'searching'   : false,
	      'ordering'    : true,
	      'info'        : true,
	      'autoWidth'   : false
	    })
	});

	function passwordStrength(password){
		$('input#txtConfirmPassword').val("");
		var count = $('input#password').val().length;
		var id_attr = "#txtConfirmPassword1";
		if(count>0){
			$('#passStrength').removeClass("hide");
	        $(id_attr).closest('.form-group').removeClass('has-success').addClass('has-error');
	        $(id_attr).removeClass('glyphicon-ok').addClass('glyphicon-remove');     
		}else{
			$('#passStrength').addClass('hide');
			$(id_attr).closest('.form-group').removeClass('has-error');
	        $(id_attr).removeClass('glyphicon-remove');
		}
	var desc = new Array();
		desc[0] = "<strong>Sangat Lemah</strong>: <div class='trans3' id='frame2' style='background:#E30404; border-radius:3px; -moz-border-radius:3px; -webkit-border-radius:3px; width:50px; height:25px;  '></div>";
		desc[1] = "<strong>Lemah</strong> 		: <div class='trans3' id='frame2' style='background:#A6FF08; border-radius:3px; -moz-border-radius:3px; -webkit-border-radius:3px; width:100px; height:25px;  '></div>";
		desc[2] = "<strong>Lebih Baik</strong>	:<div class='trans3' id='frame2' style='background:#D3FF21; border-radius:3px; -moz-border-radius:3px; -webkit-border-radius:3px; width:150px; height:25px;  '></div>";
		desc[3] = "<strong>Medium</strong>		:<div class='trans3' id='frame2' style='background:#FFE721; border-radius:3px; -moz-border-radius:3px; -webkit-border-radius:3px; width:200px; height:25px;  '></div>";
		desc[4] = "<strong>Kuat</strong>		:<div class='trans3' id='frame2' style='background:#0CDFCF; border-radius:3px; -moz-border-radius:3px; -webkit-border-radius:3px; width:250px; height:25px; '></div>";
		desc[5] = "<strong>Terkuat</strong>		:<div class='trans3' id='frame2' style='background:#005BFF; border-radius:3px; -moz-border-radius:3px; -webkit-border-radius:3px; width:300px; height:25px; '></div>";
		var score = 0;
		if (password.length > 6) score++;
		//if password has both lower and uppercase characters give 1 point 
		if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;
		if (password.match(/\d+/)) score++;
		if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	score++;
		if (password.length > 9) score++;
		document.getElementById("passwordDescription").innerHTML = desc[score];
		document.getElementById("passwordStrength").className = "strength" + score;
	}

	function checkPassword(password){
		var mainPass	= $('input#password').val();
		var id_attr = "#txtConfirmPassword1";
		if(mainPass==password){
			$(id_attr).closest('.form-group').removeClass('has-error').addClass('has-success');
	        $(id_attr).removeClass('glyphicon-remove').addClass('glyphicon-ok');
		}
		else{
			$(id_attr).closest('.form-group').removeClass('has-success').addClass('has-error');
	        $(id_attr).removeClass('glyphicon-ok').addClass('glyphicon-remove');
		}
	}

	/*$(document).on('input', '#username, #password, #txtConfirmPassword, #fullname, #id_user', function() {
		checkSubmitButton();
	});*/

	/*$("input[type='radio']").on('click', function(){
		checkSubmitButton();
	});*/
/*
	function checkSubmitButton() {
		var user = $('#username').val().length;
		var pass = $('#password').val().length;
		var confPass = $('#txtConfirmPassword').val().length;
		var nama = $('#fullname').val().length;
		var idUser = $('#id_user').val().length;
		var radio = $('input[type="radio"]:checked').val();

		if(user > 5 && nama > 5 && idUser > 5 && pass > 7 && confPass== pass && radio >= 1){
			$('#btn-submit').removeAttr('disabled','disabled');
		}else{
			$('#btn-submit').attr('disabled', 'disabled');
		}
	}*/

	function GantiPassword(){
		var cek = $('#CekPass').is(':not(:checked)');

		if (!cek) {
			$('#PassLama').removeClass('hide');
			$('#PassBaru').removeClass('hide');
			$('#RePass').removeClass('hide');
		}else{
			$('#PassLama').addClass('hide');
			$('#PassBaru').addClass('hide');
			$('#RePass').addClass('hide');
			$('passStrength').addClass('hide');
		}
	}

	$('#CekPass').on('click', function(){
		$('#passLama').val("");
		GantiPassword();
	});

	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});

	$(document).on('click', '#cektitle,#cekfooter', function(){
		var cektitle = $('#cektitle').is(':not(:checked)');
		var cekfooter = $('#cekfooter').is(':not(:checked)');

		if (!cektitle && !cekfooter) {
			$('#Approve').removeClass('disabled');
			$('#Reject').removeClass('disabled');
			$('#Revice').removeClass('disabled');
			$('#Approve').removeAttr('disabled',false);
			$('#Reject').removeAttr('disabled',false);
			$('#Revice').removeAttr('disabled',false);
		}else{
			$('#Approve').addClass('disabled');
			$('#Reject').addClass('disabled');
			$('#Revice').addClass('disabled');
			$('#Approve').attr('disabled',true);
			$('#Reject').attr('disabled',true);
			$('#Revice').attr('disabled',true);
		}
	});

	$(document).ready(function(){
		var button = $('#hdnApprove').val();

		if(button == 3){ 
			$('#Approve').removeClass('disabled');
			$('#Reject').removeClass('disabled');
			$('#Revice').removeClass('disabled');
			$('#Approve').addClass('hidden');
			$('#Reject').addClass('hidden');
			$('#Revice').addClass('hidden');
			$('#cektitle').addClass('hidden');
			$('#cekfooter').addClass('hidden');
		}
	});

//	Menu Management
//	{
		$(function(){
			//	Form Behavior
			//	{
					$('#MenuManagement-radioSubmenuNo').click(function(){
						$('#MenuManagement-configSingleMenu').removeClass("hidden");
						$('.MenuManagement-radioMenuType').removeAttr("disabled");
						$('#MenuManagement-chkPriorityInvolved').prop("disabled", true);
						$('#MenuManagement-chkPriorityInvolved').prop("disabled", true);
					});

					$('#MenuManagement-radioMenuTypeSingle').click(function(){
						$('#MenuManagement-chkPriorityInvolved').prop("disabled", true);
						$('#MenuManagement-txtExternalSite').prop("disabled", true);
					});

					$('#MenuManagement-radioMenuTypeMulti').click(function(){
						$('#MenuManagement-chkPriorityInvolved').prop("disabled", false);
						$('#MenuManagement-txtExternalSite').prop("disabled", true);
					});

					$('#MenuManagement-radioMenuTypeExternal').click(function(){
						$('#MenuManagement-chkPriorityInvolved').prop("disabled", true);
						$('#MenuManagement-txtExternalSite').prop("disabled", false);
					});

					$('#MenuManagement-radioSubmenuYes').click(function(){
						$('#MenuManagement-configSingleMenu').addClass("hidden");
					});

					$('#MenuManagement-radioSubmenuTypeSingle').click(function(){
						$('#MenuManagement-chkPriorityInvolvedSubmenu').prop("disabled", true);
						$('#MenuManagement-txtExternalSiteSubmenu').prop("disabled", true);
					});

					$('#MenuManagement-radioSubmenuTypeMulti').click(function(){
						$('#MenuManagement-chkPriorityInvolvedSubmenu').prop("disabled", false);
						$('#MenuManagement-txtExternalSiteSubmenu').prop("disabled", true);
					});

					$('#MenuManagement-radioSubmenuTypeExternal').click(function(){
						$('#MenuManagement-chkPriorityInvolvedSubmenu').prop("disabled", true);
						$('#MenuManagement-txtExternalSiteSubmenu').prop("disabled", false);
					});


					$('#MenuManagement-updateMenu-radioSubmenuNo').click(function(){
						$('#MenuManagement-updateMenu-configSingleMenu').removeClass("hidden");
						$('.MenuManagement-updateMenu-radioMenuType').removeAttr("disabled");
						$('#MenuManagement-updateMenu-chkPriorityInvolved').prop("disabled", true);
						$('#MenuManagement-updateMenu-chkPriorityInvolved').prop("disabled", true);
					});

					$('#MenuManagement-updateMenu-radioMenuTypeSingle').click(function(){
						$('#MenuManagement-updateMenu-chkPriorityInvolved').prop("disabled", true);
						$('#MenuManagement-updateMenu-txtExternalSite').prop("disabled", true);
					});

					$('#MenuManagement-updateMenu-radioMenuTypeMulti').click(function(){
						$('#MenuManagement-updateMenu-chkPriorityInvolved').prop("disabled", false);
						$('#MenuManagement-updateMenu-txtExternalSite').prop("disabled", true);
					});

					$('#MenuManagement-updateMenu-radioMenuTypeExternal').click(function(){
						$('#MenuManagement-updateMenu-chkPriorityInvolved').prop("disabled", true);
						$('#MenuManagement-updateMenu-txtExternalSite').prop("disabled", false);
					});

					$('#MenuManagement-updateMenu-radioSubmenuYes').click(function(){
						$('#MenuManagement-updateMenu-configSingleMenu').addClass("hidden");
					});

					$('#MenuManagement-updateMenu-radioSubmenuTypeSingle').click(function(){
						$('#MenuManagement-updateMenu-chkPriorityInvolvedSubmenu').prop("disabled", true);
						$('#MenuManagement-updateMenu-txtExternalSiteSubmenu').prop("disabled", true);
					});

					$('#MenuManagement-updateMenu-radioSubmenuTypeMulti').click(function(){
						$('#MenuManagement-updateMenu-chkPriorityInvolvedSubmenu').prop("disabled", false);
						$('#MenuManagement-updateMenu-txtExternalSiteSubmenu').prop("disabled", true);
					});

					$('#MenuManagement-updateMenu-radioSubmenuTypeExternal').click(function(){
						$('#MenuManagement-updateMenu-chkPriorityInvolvedSubmenu').prop("disabled", true);
						$('#MenuManagement-updateMenu-txtExternalSiteSubmenu').prop("disabled", false);
					});

			//	}

			//	Datatables
			//	{
					$('#MenuManagement-menuList').DataTable();
			//	}
		});

		// 	Individual Functions
		//	{
				function MenuManagement_updateMenu(id_menu, menu_name, menu_submenu_included, menu_radio, menu_priority_involved, menu_external_site)
				{
					$('#MenuManagement-updateMenu-txtIDMenu').val(id_menu);
					$('#MenuManagement-updateMenu-txtMenuName').val(menu_name);
					if(menu_submenu_included == '0')
					{
						$('#MenuManagement-updateMenu-radioSubmenuYes').prop("checked", false);
						$('#MenuManagement-updateMenu-radioSubmenuNo').prop("checked", true);
						$('#MenuManagement-updateMenu-configSingleMenu').removeClass('hidden');
						if(menu_radio == '1')
						{
							$('#MenuManagement-updateMenu-radioMenuTypeSingle').prop({
								disabled: false,
								checked: true,
							});
							$('#MenuManagement-updateMenu-radioMenuTypeMulti').prop({
								disabled: false,
								checked: false,
							});
							$('#MenuManagement-updateMenu-radioMenuTypeExternal').prop({
								disabled: false,
								checked: false,
							});
							$('#MenuManagement-updateMenu-chkPriorityInvolved').prop({
								disabled: true,
								checked: false,
							});
						}
						else if(menu_radio == '2')
						{
							$('#MenuManagement-updateMenu-radioMenuTypeSingle').prop({
								disabled: false,
								checked: false,
							});
							$('#MenuManagement-updateMenu-radioMenuTypeMulti').prop({
								disabled: false,
								checked: true,
							});
							$('#MenuManagement-updateMenu-radioMenuTypeExternal').prop({
								disabled: false,
								checked: false,
							});
							if(menu_priority_involved == '1')
							{
								$('#MenuManagement-updateMenu-chkPriorityInvolved').prop({
									disabled: false,
									checked: true,
								});
							}
							else
							{
								$('#MenuManagement-updateMenu-chkPriorityInvolved').prop({
									disabled: false,
									checked: false,
								});
							}
						}
						else if(menu_radio == '3')
						{
							$('#MenuManagement-updateMenu-radioMenuTypeSingle').prop({
								disabled: false,
								checked: false,
							});

							$('#MenuManagement-updateMenu-radioMenuTypeMulti').prop({
								disabled: false,
								checked: false,
							});

							$('#MenuManagement-updateMenu-radioMenuTypeExternal').prop({
								disabled: false,
								checked: true,
							});

							$('#MenuManagement-updateMenu-chkPriorityInvolved').prop({
								disabled: true,
								checked: false,
							});

							$('#MenuManagement-updateMenu-txtExternalSite').val(menu_external_site);
						}
					}
					else if(menu_submenu_included == '1')
					{
						$('#MenuManagement-updateMenu-radioSubmenuYes').prop("checked", true);
						$('#MenuManagement-updateMenu-radioSubmenuNo').prop("checked", false);
						$('#MenuManagement-updateMenu-radioMenuTypeSingle').prop({
							disabled: true,
							checked: false,
						});
						$('#MenuManagement-updateMenu-radioMenuTypeMulti').prop({
							disabled: true,
							checked: false,
						});
						$('#MenuManagement-updateMenu-radioMenuTypeExternal').prop({
							disabled: true,
							checked: false,
						});
					}
					$('#MenuManagement-updateMenu').modal("show");
				}

				function MenuManagement_deleteMenu(id_menu, menu_name) 
				{
					$('#MenuManagement-deleteMenu-txtIDMenu').val(id_menu);
					$('#MenuManagement-deleteMenu-menuName').html(menu_name);
					$('#MenuManagement-deleteMenu').modal("show");
				}

				function MenuManagement_insertSubmenu(id_menu)
				{
					$('#MenuManagement-insertSubmenu').modal("show");
					$('#MenuManagement-insertSubmenu-txtIDMenu').val(id_menu);
				}


				function MenuManagement_updateSubmenu(id_menu_sub1, sub1_name, sub1_radio, sub1_priority_involved, sub1_external_site) 
				{
					$('#MenuManagement-updateSubmenu-txtIDSubmenu').val(id_menu_sub1);
					$('#MenuManagement-updateSubmenu-txtSubmenuName').val(sub1_name);
					if(sub1_radio == '1')
					{
						$('#MenuManagement-updateSubmenu-radioSubmenuTypeSingle').prop("checked", true);
						$('#MenuManagement-updateSubmenu-radioSubmenuTypeMulti').prop("checked", false);
						$('#MenuManagement-updateSubmenu-radioSubmenuTypeExternal').prop("checked", false);
						$('#MenuManagement-updateSubmenu-chkPriorityInvolvedSubmenu').prop("checked", false).prop("disabled", true);
						$('#MenuManagement-updateSubmenu-txtExternalSiteSubmenu').val(sub1_external_site).prop("disabled", true);
					}
					if(sub1_radio == '2')
					{
						$('#MenuManagement-updateSubmenu-radioSubmenuTypeSingle').prop("checked", false);
						$('#MenuManagement-updateSubmenu-radioSubmenuTypeMulti').prop("checked", true);
						$('#MenuManagement-updateSubmenu-radioSubmenuTypeExternal').prop("checked", false);
						if(sub1_priority_involved == '1')
						{
							$('#MenuManagement-updateSubmenu-chkPriorityInvolvedSubmenu').prop("checked", true).prop("disabled", true);
						}
						$('#MenuManagement-updateSubmenu-txtExternalSiteSubmenu').val(sub1_external_site).prop("disabled", true);
					}
					if(sub1_radio == '3')
					{
						$('#MenuManagement-updateSubmenu-radioSubmenuTypeSingle').prop("checked", false);
						$('#MenuManagement-updateSubmenu-radioSubmenuTypeMulti').prop("checked", false);
						$('#MenuManagement-updateSubmenu-radioSubmenuTypeExternal').prop("checked", true);
						$('#MenuManagement-updateSubmenu-chkPriorityInvolvedSubmenu').prop("checked", false).prop("disabled", true);
						$('#MenuManagement-updateSubmenu-txtExternalSiteSubmenu').val(sub1_external_site).prop("disabled", false);
					}
					$('#MenuManagement-updateSubmenu').modal("show");
				}

				function MenuManagement_deleteSubmenu(id_menu_sub1, submenu_name, menu_name) 
				{
					$('#MenuManagement-deleteSubmenu-txtIDSubmenu').val(id_menu_sub1);
					$('#MenuManagement-deleteSubmenu-menuName').html(menu_name);
					$('#MenuManagement-deleteSubmenu-submenuName').html(submenu_name);
					$('#MenuManagement-deleteSubmenu').modal("show");
				}

		//	}
//	}