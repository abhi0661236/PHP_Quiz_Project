// This function is for showing data into input fields


function editQuestion(itemNo) {
  // console.log(itemNo);
  $.ajax({
    type: 'POST',
    url: 'show_data.php',
    data: {},
    dataType: 'json',
    encode: true,
    statusCode: {
      404: function () {
        alert("Unable to show data");
      },
    },
    success: function(data){
      
      var index = itemNo-2;
      var uniqueID = data[index]['question_u_id'];
      // console.log();
      var ques_data = JSON.parse(data[index]['ques_data']);
      // console.log(ques_data['choices'][0]);
      $('#qID').val(uniqueID);
      $('#update_qbody').val(ques_data['question']);
      $('#update-option1').val(ques_data['choices'][0]);
      $('#update-option2').val(ques_data['choices'][1]);
      $('#update-option3').val(ques_data['choices'][2]);
      $('#update-option4').val(ques_data['choices'][3]);
      var radioButtons = $("#update-form input:radio[name='update_radio']");
      radioButtons[ques_data['correctAnswer']].checked = true;
    }

  });
}


function deleteQuestion(item){
  
  var indexObj = {};
  
  indexObj['index'] = item;
  

  $.ajax({
    type: 'POST',
    url: 'delete_data.php',
    data: indexObj,
    dataType: 'json',
    encode: true,
    statusCode: {
      404: function () {
        alert("Unable to delete data");
      },
    },
    success: function(data){
      console.log(data);

    }

  });
  
  location.reload();
}






$(document).ready(function () {
  

  

  $.ajax({
    type: 'POST',
    url: 'show_data.php',
    data: {},
    dataType: 'json',
    encode: true,
    statusCode: {
      404: function () {
        alert("Unable to show data");
      },
    },
    success: function(data){
      // console.log(data);
      var item_no = 1;
      
      data.forEach(element => {
        var uid = element['question_u_id'];
        var ques_data = JSON.parse(element['ques_data']);
        var question = ques_data['question'];
        
        var tableBody = $('#all-data-table');
        var template = `<tr>
        <th scope="row">${item_no++}</th>
        <td>${question}</td>
        <td>
          <button data-bs-target="#modal-for-edit" data-bs-toggle="modal" class="btn btn-primary m-2" onclick="editQuestion(${item_no});">
            <i class="fas fa-pen"></i> &nbsp;&nbsp;Edit
          </button>
          <button class="btn btn-danger m-2" onclick="deleteQuestion(${uid});">
            <i class="fas fa-trash-alt"></i> &nbsp;&nbsp;Delete
          </button>
        </td>
      </tr>`;
      

      tableBody.append(template);
      });


      
    }
  });

  // event handler for update button

  $('#update-ques').click(function(){



    var myformdata = {}
    var ques_data_updated = {};
    var choices = [];

    var u_id_question = $('#qID').val();
    var question = $('#update_qbody').val();
    var correctAnswer = $('input[name=update_radio]:checked').val();
    choices.push($('#update-option1').val());
    choices.push($('#update-option2').val());
    choices.push($('#update-option3').val());
    choices.push($('#update-option4').val());

    ques_data_updated['choices'] = choices;
    ques_data_updated['question'] = question;
    ques_data_updated['correctAnswer'] = correctAnswer;

    myformdata['u_id_question'] = u_id_question;
    myformdata['ques_data_updated'] = ques_data_updated;
    // console.log(myformdata);


    $.ajax({
      type: 'POST',
      url: 'update_data.php',
      data: myformdata,
      dataType: 'json',
      encode: true,
      statusCode: {
      404: function () {
        alert("Unable to show data");
        },
      },
      success: function(data){
        alert(data);
      }



    });
  });







  // code for azax query
  $("#v-pills-profile-tab").click(function () {
    $.ajax({
      type: "POST",
      url: "getdata.php",
      data: {},
      dataType: "json",
      encode: true,
      statusCode: {
        404: function () {
          alert("Request page not found");
        },
      },
      beforeSend: function (xhr) {},


      success: function (data) {
        var result = data["data"];
        var questions = [];

        try {
          result.forEach(element => {
            var ques_data = JSON.parse(element['ques_data']);
            // console.log(ques_data);
            questions.push(ques_data);
          });
        } catch (error) {
          alert("Sorry no questions are found !!");
          location.reload();
        }
        
        

        var questionCounter = 0; // Tracks question number
        var selections = []; // Array containing user choices
        var quiz = $("#quiz"); // holding the quiz element

        // Display initial question.
        displayNext();

        // Display next requested element
        function displayNext() {
          quiz.fadeOut(function () {
            $("#question").remove();

            if (questionCounter < questions.length) {
              var nextQuestion = createQuestionElement(questionCounter);
              quiz.append(nextQuestion).fadeIn();

              if (!isNaN(selections[questionCounter])) {
                $("input[value=" + selections[questionCounter] + "]").prop(
                  "checked",
                  true
                );
              }

              // controls display of 'prev' button

              if (questionCounter === 1) {
                $("#prev").show();
              } else if (questionCounter === 0) {
                $("#prev").hide();
                $("#next").show();
              }
            } else {
              var scoreElem = displayScore(); // see defintion at the end of the file
              quiz.append(scoreElem).fadeIn();
              $("#next").hide();
              $("#prev").hide();
              $('#chk-btn').hide();
              $("#start").show();
            }
          });
        }

        // created question elements

        function createQuestionElement(index) {
          var qElement = $("<div>", { id: "question" });

          var header = $(
            "<h2>Question " +
              (index + 1) +
              ":</h2>" +
              '<i id="correct" class="green far fa-check-circle"></i> ' +
              '<i id="incorrect" class="red far fa-times-circle"></i>'
          );
          qElement.append(header);

          var question = $("<p>").append(questions[index].question);
          qElement.append(question);

          var radioButtons = createRadios(index);
          qElement.append(radioButtons);

          return qElement;
        }

        // created radio elements

        function createRadios(index) {
          var radioList = $("<ul>");
          var item;
          var input = "";
          // console.log(questions[0].choices);
          for (var i = 0; i < questions[index].choices.length; i++) {
            item = $("<li>");
            input = '<input type="radio" name="answer" value=' + i + " />";
            input += questions[index].choices[i];
            item.append(input);
            radioList.append(item);
          }

          return radioList;
        }

        // console.log("Hi from console");

        // click handler for next button
        $("#next").on("click", function (e) {
          e.preventDefault();

          choose();

          // If no user selection, progress is stopped
          if (isNaN(selections[questionCounter])) {
            alert("Please make a selection!");
          } else {
            questionCounter++;
            displayNext();
          }
        });

        // click listener for prev button
        $("#prev").on("click", function (e) {
          e.preventDefault();

          choose();
          questionCounter--;
          displayNext();
        });

        function choose() {
          selections[questionCounter] = +$(
            'input[name="answer"]:checked'
          ).val();
          // console.log(selections);
        }

        // check answer and give feedback

        $("#chk-btn").click(function () {
          var index = $('input[name="answer"]:checked').val();

          if (index == questions[questionCounter].correctAnswer) {
            $("#correct").show();
            $("#incorrect").hide();
            console.log("Answer is correct");
          } else {
            $("#incorrect").show();
            $("#correct").hide();
            console.log("Answer is incorrect");
          }
        });

        // startover button for replay
        $('#start').on('click', function (e) {
          e.preventDefault();
          
          if(quiz.is(':animated')) {
            return false;
          }
          questionCounter = 0;
          selections = [];
          $('#chk-btn').show();
          displayNext();
          $('#start').hide();
          
        });


        function displayScore() {
          var score = $("<p>", { id: "question" });
          // console.log(score);

          var numCorrect = 0;
          for (var i = 0; i < selections.length; i++) {
            if (selections[i] === questions[i].correctAnswer) {
              numCorrect++;
              console.log(numCorrect);
            }
          }

          // console.log(numCorrect)

          var usrScore = numCorrect * 10;
          var maxScore = questions.length * 10;

          score.append(`Your Score is ${usrScore} out of ${maxScore}.`);
          return score;
        }
      }
    });
  });

  
  // taking user input 

  
  var myformdata = {};
  
  
  $('#add-ques').click(function(){
    var choices = [];
    var question = $('#qbody').val();
    var correctAnswer = $('input[name=c_option]:checked').val();
    choices.push($('#o1').val());
    choices.push($('#o2').val());
    choices.push($('#o3').val());
    choices.push($('#o4').val());

    myformdata['choices'] = choices;
    myformdata['question'] = question;
    myformdata['correctAnswer'] = correctAnswer;

    
    $("#modal-for-add").modal('hide');

    $.ajax({
      type: 'POST',
      url: 'add_data.php',
      data: myformdata,
      dataType: 'json',
      encode: true,
      statusCode: {
        404: function () {
          alert("Request page not found");
        },
      },
      success: function(data){
        console.log(data);
      }
    });
    
    
  });

  
  
  

});
