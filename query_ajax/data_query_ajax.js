
$(document).ready(function(){
    $('#family_insert_btn').click('submit',function(e){
        e.preventDefault();
     var familyid = $('select#familyid').val();
     var familyname = $('input#familyname').val();
     var familyjob = $('input#familyjob').val();
     var familyincome = $('input#familyincome').val();
     if(familyid == 0){
         $('select#familyid').focus();
         return false;
     }
     if(familyname == ""){
         $('input#familyname').focus();
         return false;
     }
     if(familyjob == ""){
        $('input#familyjob').focus();
        return false;
    }
    if(familyincome == ""){
        $('input#familyincome').focus();
        return false;
    }
    $.ajax({
        url: "../family_insert/family_insert.php",
        method: "POST",
        data: $('#familyform').serialize(),
        beforeSend:function(){
            $('#family_insert_btn').val('insert');
        },
        success:function(data){
            $('#familyform')[0].reset();
            $('#family_modal').modal('hide');
            $('family_data').html(data);

        }
    })
    });
    });


// =========== parent insert
$(document).ready(function() {
    $('#parent_insert_btn').click('submit', function(e) {
        e.preventDefault();       
        var parentnim = $("select#parentnim").val();
        var parent_insert_id = $("select#parent_insert_id").val();
        if (parentnim == 0) {
            $("select#parentnim").focus();
            return false;
        }
        if (parent_insert_id == 0) {
            $("select#parent_insert_id").focus();
            return false;
        }
      
        $.ajax({
            url: '../family_insert/parent_insert.php',
            method: "POST",
            data: $('#parent-modal').serialize(),
            beforeSend: function() {
                $('#parentaddbtn').val('Inserting');
            },
            success: function(data) {
               $('#parent-modal')[0].reset();
                $('#parent_modal').modal('hide');
                $('parent_table').html(data);
            }
        });
    });
});
// insert schedule
// $(document).ready(function() {
//     $('#insert_schedule_btn').click('submit', function(e) {
//         e.preventDefault();
//         $("#error").hide();
//         var schedule_student_id = $("select#schedule_student_id").val();
//         var choose_subject = $("select#choose_subject").val();
//         var choose_teacher = $("select#choose_teacher").val();
//         var class_id = $('select#class_id').val();
//         var choose_day = $('select#choose_day').val();
//         if (schedule_student_id == 0) {
//            $('select#schedule_student_id').focus();
//             return false;
//         }
//         if (choose_subject == 0) {
//             $('select#choose_subject').focus();
//             return false;
//         }
//         if (choose_teacher == 0) {
//             $('select#choose_teacher').focus();
//             return false;
//         }
//         if (class_id == 'Select The Class') {
//             return false;
//         }
//         if (choose_day == 0) {
//             $('select#choose_day').focus();
//             return false;
//         }
//         $.ajax({
//             url: '../time_table/insert_schedule.php',
//             method: "POST",
//             data: $('#schedule_modal').serialize(),
//             beforeSend: function() {
//                 $('#insert_schedule_btn').val('Inserting');
//             },
//             success: function(data) {
//                 $('#schedule_modal')[0].reset();
//                 $('#insert_schedule_modal').modal('hide');
//                 $('schedule_modal').html(data);
//             }
//         });
//     });
// });

// ========== insert teacher 
$(document).ready(function() {


    $('#teacher_add_btn').click('submit', function(e) {
        e.preventDefault();
      
        var teacher_add_nim = $("input#teacher_add_nim").val();
        var teacher_add_name = $("input#teacher_add_name").val();
        var teacher_add_lname = $('input#teacher_add_lname').val();
        var teacher_add_address = $('input#teacher_add_address').val();
        var teacher_add_email = $('input#teacher_add_email').val();
        var teacher_add_profession = $('select#teacher_add_profession').val();
        var teacher_add_pass = $('input#teacher_add_pass').val();
        var id_length = teacher_add_nim.length;
        $("input#teacher_add_nim").keypress(function(event) {
            return /\d/.test(String.fromCharCode(event.keyCode));
        });
        if (teacher_add_nim == "") {
            $("input#teacher_add_nim").focus();
            return false;
        } else if (id_length > 14 || id_length < 14) {
            alert('ID is either too short or too long: ' + id_length);
            $("input#teacher_add_nim").focus();
            return false;
        }

        if (teacher_add_name == "") {
            $('input#teacher_add_name').focus();
            return false;
        }

        if (teacher_add_lname == "") {
            $("input#teacher_add_lname").focus();
            return false;
        }

        if (teacher_add_address == "") {
            $('input#teacher_add_address').focus();
            return false;
        }

        if (teacher_add_email == "") {
            $('input#teacher_add_email').focus();
            return false;
        } 
        
        if (teacher_add_profession == 0) {
            $('select#teacher_add_profession').focus();
            return false;
        }
        if (teacher_add_pass == "") {
            $('input#teacher_add_pass').focus();
            return false;
        }

        $.ajax({
            url: '../insert_teacher/insert_teacher.php',
            method: "POST",
            data: $('#teacher_modal').serialize(),
            beforeSend: function() {
                $('#teacher_add_btn').val('Inserting');
            },
            success: function(data) {
                $('#teacher_modal')[0].reset();
                $('#teacher_insert_modal').modal('hide');
                $('teacher_modal').html(data);
            }
        });
    });
});

function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test(email)) {
        return false;
    } else {
        return true;
    }
}

// this is for side bar js
function show_side() {
    var x = document.getElementById("side_bar");
    x.style.transition = '.5s';
    if (!x.style.display || x.style.width === "0px") {
        x.style.width = '150px';
        x.style.display = 'block';
    } else {
        x.style.width = "0px";
    }
}
// this for new tab
function newTab() {
    window.open('../add_modal/add_data.php');
}

// ===============add new user
$(document).ready(function() {
    $('#admin_insert').click('submit', function(e) {
        e.preventDefault();
        var admin_nim = $("input#admin_nim").val();
        var admin_name = $("input#admin_name").val();
        var admin_email = $("input#admin_email").val();
        var admin_pass = $('input#admin_pass').val();
        var admin_conpass = $('input#admin_conpass').val();
        var len = admin_nim.length;
        if (admin_nim == "") {
            $('input#admin_nim').focus();
            return false;
        } else if (len > 14 || len < 14) {
            alert('ID should be 14 number: ' + len);
            $('input#admin_nim').focus();
            return false;
        }
        if (admin_name == "") {
            $('input#admin_name').focus();
            return false;
        }
        if (admin_email == "") {
            $('input#admin_email').focus();
            return false;
        } else if (IsEmail(admin_email) == false) {
            $('input#admin_email').focus();
            alert('Email is not valid', IsEmail());
            return false;
        }
        if (admin_pass == "") {
            $('input#admin_pass').focus();
            return false;
        }
        if (admin_conpass == "") {
            $('input#admin_conpass').focus();
            return false;
        } else if (admin_pass != admin_conpass) {
            alert('password not matched');
            $('input#admin_conpass').focus();
            return false;
        }
        $.ajax({
            // ../admin_insert/admin_insert.php

            url: '../admin_insert/admin_insert.php',
            type: "post",
            data: new FormData(this.form),
            processData: false,
            contentType: false,
            cache: false,
            async: false,

            beforeSend: function() {
                $('#admin_insert').val('Inserting');
            },
            success: function(data) {
                $('#admin_form')[0].reset();
                $('admin_form').html(data);



            },

        });


    });
});

// insert classes 

$(document).ready(function(){
    $('#insert_class_subjects').click('submit', function(e){
        e.preventDefault();
      var class_grade_number_1 = $('select#class_grade_number_1').val();
      var class_code_number_2 = $('input#class_code_number_2').val();
      var codelength = class_code_number_2.length;
      var class_name_number_3 = $('input#class_name_number_3').val();
      var days_class = $('select#days_class').val();
      var class_subject_id = $('select#class_subject_id').val();
      var class_teacher_id = $('select#class_teacher_id').val();
      var class_student_id = $('select#class_student_id').val();
      if(class_grade_number_1 == 0){
          $('select#class_grade_number_1').focus();
          return false;
      }
      if(class_code_number_2 == ""){
          $('input#class_code_number_2').focus();
          return false;
      }else if(codelength >5 || codelength<5){
          alert('Five number required: ' + codelength);
          $('input#class_code_number_2').focus();
          return false;
      }
     
      if(class_name_number_3 == ""){
          $('input#class_name_number_3').focus();
          return false;
      }
      if(days_class == 0){
          $('select#days_class').focus();
          return false;
      }
      if(class_subject_id == 0){
          $('select#class_subject_id').focus();
          return false;
      }
      if(class_teacher_id == 0){
          $('select#class_teacher_id').focus();
          return false;
      }
      if(class_student_id == 0){
          $('select#class_student_id').focus();
          return false;
      }
      $.ajax({
          url: '../insert_classes/insert_classes.php',
          method: "POST",
          data: $('#class-modal-form').serialize(),
          beforeSend:function(){
              $('#insert_class').val('Inserting');
          },
          success:function(data){
              $('#class-modal-form')[0].reset();
              $('#classesmodal').modal('hide');
              $('class-modal').html(data);
          }

      })
    

    })
})


// insert grade
$(document).ready(function() {
    $('#insert_new_grade_student_btn').click('submit', function(e) {
        e.preventDefault();
        var number_grade = $('input#number_grade').val();
        var select_grade_number = $('select#select_grade_number').val();
        var grade_student_id = $('input#grade_student_id').val();
        var grade_teacher_id = $('input#grade_teacher_id').val();
        var select_grade_subjects = $('select#select_grade_subjects').val();
        var select_grade_student = $('select#select_grade_student').val();
        if (number_grade == "") {
            $('input#number_grade').focus();
            return false;
        }
        // if(select_grade_number == 0){
        //     $('select#select_grade_number').focus();
        //     return false;
        // }
        if (grade_student_id == "") {
            $('input#grade_student_id').focus();
            return false;
        }
        if (grade_teacher_id == "") {
            $('input#grade_teacher_id').focus();
            return false;
        }
        if(select_grade_subjects ==0){
            $('select#select_grade_subjects').focus();
            return false;
        }
        if(select_grade_student == 0){
            $('select#select_grade_student').focus();
            return false;
        }

        $.ajax({
            url: '../modals/grade.php',
            method: "POST",
            data: $('#grade_form').serialize(),
            beforeSend: function() {
                $('#insert_grade').val('Inserting');
            },
            success: function(data) {
                $('#grade_form')[0].reset();
                $('#gradeModal').modal('hide');
                $('grade_modal').html(data);
            }
        });

    });
});


// insert subjects
$(document).ready(function(){
    $('#insert_subject').click('submit', function(e){
        e.preventDefault();
       var select_subject_all = $('input#select_subject_all').val();
       var all_subjectname = $('select#all_subjectname').val();
       var all_subject_id = $('input#all_subject_id').val();
       if(select_subject_all == ""){
           $('input#select_subject_all').focus();
           return false;
       }
       if(all_subjectname == 0){
           $('select#all_subjectname').focus();
           return false;
       }
       if(all_subject_id == ""){
           $('input#all_subject_id').focus();
           return false;
       }
       $.ajax({
           url: "../insert_subject/insert_subject.php",
           method: "POST",
           data: $('#subject-modal-form').serialize(),
           beforeSend:function(){
               $('#insert_subject').val('Inserting');
           },
           success:function(data){
            $('#subject-modal-form')[0].reset();
            $('#subjectmodal').modal('hide');
            $('#subject-modal-form').html(data);
          


           }
           
       });
       
    });
});


// change password 
$(document).ready(function(){
    $('#change-student-password').click('submit', function(e){
        e.preventDefault();
        var old_student_password = $('input#old_student_password').val();
        var new_student_password = $('input#new_student_password').val();
        var new_student_conpassword = $('input#new_student_conpassword').val();
        if(old_student_password == ""){
            alert('Old password emtpy');
            $('input#old_student_password').focus();
            return false;
        }
        if(new_student_password == ""){
            alert('Enter new passwword');
            $('input#new_student_password').focus();
            return;
        }
        if(new_student_conpassword == ""){
            alert('Confirm your new password');
            $('input#new_student_conpassword').focus();
            return false;
        }else if(new_student_conpassword != new_student_password){
            alert('Password now matched');
            $('input#new_student_password').val("");
            $('input#new_student_conpassword').val("");
            return false;
        }
        $.ajax({
            url: '../student_change_password/student_change_password.php',
            method: 'POST',
            data: $('#student_form_change_password').serialize(),
            beforeSend:function(){
                $('#change-student-password').val();
            },
            success: function (data) {
               
               
                setTimeout(function(){
                $('#student_form_change_password')[0].reset();
                
                },2000)
               
            }
          

        })
    });
});


// this is only allowing number
function process(input) {
    let value = input.value;
    let numbers = value.replace(/[^0-9]/g, "");
    input.value = numbers;
}
