function ajax_request(request, id){

  if(request == undefined){
    request = '';
    id = '';
  } else if (request == 'add_new_record'){
    id = '';
  }
  var student_name = document.getElementById('student_name').value;
  var student_subject = document.getElementById('student_subject').value;
  var student_fee = document.getElementById('student_fee').value;
  if(student_name ==''){
    student_name = '';
  }
  if(student_subject ==''){
    student_subject= '';
  }
  if(student_fee ==''){
    student_fee = '';
  }

  var req = new XMLHttpRequest();
  req.onreadystatechange = function(){
    if(req.readyState == 4 && req.status == 200){
      var test_div = document.getElementById('test');
      test_div.innerHTML = req.responseText;
    }
  }

  req.open('GET','data.php?add_req='+request+'&id='+id+'&stu_name='+student_name+
  '&stu_subject='+student_subject+'&stu_fee='+student_fee, true );
  req.send();
}

function edit_request(req_type, edit_id){
  if (req_type == 'edit_req'){
    ed_student_name = '';
    ed_student_subject = '';
    ed_student_fee = '';
  } else {
    var ed_student_name = document.getElementById('ed_student_name').value;
    var ed_student_subject = document.getElementById('ed_student_subject').value;
    var ed_student_fee = document.getElementById('ed_student_fee').value;
  }
  var req = new XMLHttpRequest();
  req.onreadystatechange = function(){
    if(req.readyState == 4 && req.status == 200){
      var form_data = document.getElementById('form_data');
      form_data.innerHTML = req.responseText;
      if(req_type == 'edit_button'){
          window.location.reload();
      }
    }
  }

  req.open('GET','edit.php?req_type='+req_type+'&edit_id='+edit_id+'&ed_stu_name='+ed_student_name+
  '&ed_stu_subject='+ed_student_subject+'&ed_stu_fee='+ed_student_fee, true );
  req.send();
}
