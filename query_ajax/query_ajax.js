$(".panel .panel-collapse").on('shown.bs.collapse', function() {
	var active = $(this).attr('id');
	var panels = localStorage.panels === undefined ? new Array() : JSON.parse(localStorage.panels);
	if($.inArray(active, panels) == -1) //check that the element is not in the array
		panels.push(active);
	localStorage.panels = JSON.stringify(panels);
});
$(".panel .panel-collapse").on('hidden.bs.collapse', function() {
	var active = $(this).attr('id');
	var panels = localStorage.panels === undefined ? new Array() : JSON.parse(localStorage.panels);
	var elementIndex = $.inArray(active, panels);
	if(elementIndex !== -1) //check the array
	{
		panels.splice(elementIndex, 1); //remove item from array
	}
	localStorage.panels = JSON.stringify(panels); //save array on localStorage
});
var panels = localStorage.panels === undefined ? new Array() : JSON.parse(localStorage.panels); //get all panels
for(var i in panels) { //<-- panel is the name of the cookie
	if($("#" + panels[i]).hasClass('panel-collapse')) // check if this is a panel
	{
		$("#" + panels[i]).collapse("show");
	}
}
// =========================Insert student
$(document).ready(function() {
	// var len = nim.length;

	$('#insert_form').on("submit", function(event) {
		event.preventDefault();
		var nim = $("input#nim").val();
		var nimlength = nim.length;
		if(nim == "") {
			$("input#nim").focus();
			return false;
		} else if(nimlength > 14 || nimlength < 14) {
			$("input#nim").focus();
			alert('The ID length should be 14');
			return false;
		}
		var name = $("input#name").val();
		if(name == "") {
			$("input#name").focus();
			return false;
		}
		var lname = $("input#lname").val();
		if(lname == "") {
			$("input#lname").focus();
			return false;
		}
		var address = $("input#address").val();
		if(address == "") {
			$("input#address").focus();
			return false;
		}
		var email_student = $("input#email_student").val();
		if(email_student == "") {
			$("input#email_student").focus();
			return false;
		}else if (IsEmail(email_student) == false) {
			alert('Email is not valid', IsEmail());
			$("input#email_student").focus();
            return false;
		}
		
		var age = $("input#age").val();
		
		if(age == "") {
			$("#error").fadeIn().text("Nationality required.");
			$("input#age").focus();
			return false;
		}else if(age>25){
			alert("Sorry we can't accept he is too old ");
			$("input#age").focus();
			return false;
		}else if(age <=4){
			alert("Sorry we can't accept he is too small ");
			$("input#age").focus();
			return false;
		}
		
		// country  required
		var country_student = $("input#country_student").val();
		if(country_student == "") {
			$("input#country_student").focus();
			return false;
		}
		// password
		var student_password = $("input#student_password").val();
		if(student_password == "") {
			$("input#student_password").focus();
			return false;
		}
		$.ajax({
			url: "../insert_student/insert_student.php",
			method: "POST",
			data: $('#insert_form').serialize(),
			beforeSend: function() {
				$('#insert').val("Inserting");
			},
			success: function(data) {
				$('#insert_form')[0].reset();
				$('#add_data_Modal').modal('hide');
				$('#employee_table').html(data);
			}
		});
	});
});
// ============================View Data
viewData();

function viewData() {
	$(document).ready(function() {
		$('.edit_data_student').click(function() {
			var employee_id = $(this).attr("id");
			$.ajax({
				url: "../select_data/select_data.php",
				method: "post",
				data: {
					employee_id: employee_id
				},
				success: function(data) {
					$('#student_details').html(data);
					$('#view_data_student').modal("show");
				}
			});
		});
	});
	
	
	}
UpdateAll();

function UpdateAll() {
	// this fetch is for student
	$(document).on('click', '.updateBtn', function() {
		var id = $(this).attr("id");
		$.ajax({
			url: "../update_student/fetch.php",
			method: "POST",
			data: {
				id: id
			},
			dataType: "json",
			success: function(data) {
				$('#updateidnim').val(data[0]);
				$('#updatenim').val(data[1]);
				$('#updatename').val(data[2]);
				$('#updatelname').val(data[3]);
				$('#updateaddress').val(data[4]);
				$('#updateemail').val(data[5]);
				$('#updateage').val(data[6]);
				$('#updatecountrystudent').val(data[7]);
				$('#updatepassword').val(data[8]);
				$('#updateModal').modal('show');
			}
		});
	});
	// ====================teacher Update
	$(document).on('click', '.teacher-btn', function() {
		var NIM = $(this).attr("id");
		$.ajax({
			url: "../teacher_update/teacher_fetch.php",
			method: "POST",
			data: {
				NIM: NIM
			},
			dataType: "json",
			success: function(data) {
				$('#tec_id').val(data[0]);
				$('#teacherid').val(data[1]);
				$('#teachername').val(data[2]);
				$('#teacherlastname').val(data[3]);
				$('#teacheraddress').val(data[4]);
				$('#teacheremail').val(data[5]);
				$('#teacherprofession').val(data[6]);
				$('#teachermodal').modal('show');
			}
		});
	});
	// ===========================schedule update
	$(document).on('click', '.schedule-btn', function() {
		var scheduleid = $(this).attr("id");
		$.ajax({
			url: "../schedule_update/schedule_fetch.php",
			method: "POST",
			data: {
				scheduleid: scheduleid
			},
			dataType: "json",
			success: function(data) {
				$('#timetableid').val(data[0]);
				$('#studentid').val(data[1]);
				$('#subjectid').val(data[2]);
				$('#teachersid').val(data[3]);
				$('#class_id').val(data[4]);
				$('#days').val(data[5]);
				$('#starttime').val(data[6]);
				$('#endtime').val(data[7]);
				$('#schedulemodal').modal('show');
			}
		});
	});
	// ===========================family update
	$(document).on('click', '.family-btn', function() {
		var familyid = $(this).attr("id");
		$.ajax({
			url: "../family_insert/family_fetch.php",
			method: "POST",
			data: {
				familyid: familyid
			},
			dataType: "json",
			success: function(data) {
				$('#family_id_auto').val(data[0]);
				$('#familystudentid').val(data[1]);
				$('#familyfatherid').val(data[2]);
				$('#familyfathername').val(data[3]);
				$('#familyfatherjob').val(data[4]);
				$('#familymodal').modal('show');
			}
		});
	});
}
DeleteAll();

function DeleteAll() {
	$(document).ready(function() {
		// Delete
		$('.delete_student').click(function() {
			var question = confirm('Are you sure ?');
			if(question == true) {
				var el = this;
				var id = this.id;
				var splitid = id.split("_");
				// Delete id
				var deleteid = splitid[1];
				// AJAX Request
				$.ajax({
					url: '../delete_student/delete_student.php',
					type: 'POST',
					data: {
						id: deleteid
					},
					success: function(response) {
						if(response == 1) {
							// Remove row from HTML Table
							$(el).closest('tr').css('background', 'red');
							$(el).closest('tr').fadeOut(800, function() {
								$(this).remove();
							});
						} else {
							alert('Invalid ID.');
						}
					}
				});
			} else {
				return false;
			}
		});
	});
	// ========================teacher delete
	$(document).ready(function() {
		// Delete
		$('.delete_teacher').click(function() {
			var question = confirm('Are you sure ?');
			if(question == true) {
				var el = this;
				var id = this.id;
				var splitid = id.split("_");
				// Delete id
				var deleteid = splitid[1];
				// AJAX Request
				$.ajax({
					url: '../delete_teacher/delete_teacher.php',
					type: 'POST',
					data: {
						id: deleteid
					},
					success: function(response) {
						if(response >0) {
							// Remove row from HTML Table
							$(el).closest('tr').css('background', 'red');
							$(el).closest('tr').fadeOut(800, function() {
								$(this).remove();
							});
						} else {
							alert('Invalid ID.');
						}
					}
				});
			} else {
				return false;
			}
		});
	});
}


function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test(email)) {
        return false;
    } else {
        return true;
    }
}
