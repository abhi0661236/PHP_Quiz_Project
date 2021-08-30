<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open Sans" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Quiz</title>
  <link rel="stylesheet" href="./bootstrap.css" />
  <link rel="stylesheet" href="./style.css" />
</head>

<body style="overflow: hidden;">
  <div class="d-flex container-fluid" id="parent-container">
    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <div class="layer">
        <div id="img-container" class="pt-5">
          <img id="#logo" class="img-fluid rounded-circle" src="./media/letter-146011_640.png" alt="" />
        </div>
        <button class="" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button"
          role="tab" aria-controls="v-pills-home" aria-selected="true">
          Home
        </button>
        <button class="" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button"
          role="tab" aria-controls="v-pills-profile" aria-selected="false">
          Quiz
        </button>
        <button class="" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages"
          type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">
          Blog
        </button>
        <button class="" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings"
          type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
          Contact
        </button>
      </div>
    </div>

    <div style="overflow: auto;" class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
        <div style="justify-content: space-between;" class="container d-flex align-items-center mycontainer bg-dark text-white p-4">
          
          <div>
            <h1 class="">Total questions</h1>
          </div>
          <div>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-for-add">
              <i class="fas fa-plus"></i> &nbsp;&nbsp;Add Question
            </button>
          </div>

          <!-- Modal for add question-->


          <div class="modal fade text-dark" id="modal-for-add" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="Label-for-add" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="Label-for-add">
                    Add Question
                  </h2>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="add-form">
                    <div class="mb-3">
                      <label for="qbody" class="form-label">Question</label>
                      <input type="text" class="form-control" id="qbody" />
                    </div>

                    <div class="row">
                      <div class="mb-3 col">
                        <label for="o1" class="form-label">Option-1</label>
                        <input type="text" class="form-control" id="o1" />
                      </div>
                      <div class="mb-3 col">
                        <label for="o2" class="form-label">Option-2</label>
                        <input type="text" class="form-control" id="o2" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="mb-3 col">
                        <label for="o3" class="form-label">Option-3</label>
                        <input type="text" class="form-control" id="o3" />
                      </div>

                      <div class="mb-3 col">
                        <label for="o4" class="form-label">Option-4</label>
                        <input type="text" class="form-control" id="o4" />
                      </div>
                    </div>

                    <p>Choose the correct answer<span>*</span></p>

                    <div class="row container">
                      <div class="form-check col">
                        <input required class="form-check-input" type="radio" name="c_option" id="radio-option1"
                          value="0" />
                        <label class="form-check-label" for="radio-option1">
                          Option 1
                        </label>
                      </div>
                      <div class="form-check col">
                        <input class="form-check-input" type="radio" name="c_option" id="radio-option2"
                          value="1" />
                        <label class="form-check-label" for="radio-option2">
                          Option 2
                        </label>
                      </div>
                      <div class="form-check col">
                        <input class="form-check-input" type="radio" name="c_option" id="radio-option3"
                          value="2" />
                        <label class="form-check-label" for="radio-option3">
                          Option 3
                        </label>
                      </div>
                      <div class="form-check col">
                        <input class="form-check-input" type="radio" name="c_option" id="radio-option4"
                          value="3" />
                        <label class="form-check-label" for="radio-option4">
                          Option 4
                        </label>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button id="close-btn-add" type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                      </button>
                      <button id="add-ques" type="submit" class="btn btn-primary">
                        Add
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>





          <!-- Modal for update question -->


          <div class="modal fade text-dark" id="modal-for-edit" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="Label-for-edit" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="Label-for-edit">
                    Update Question
                  </h2>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="update-form">


                    <!-- for developers only -->
                    <div class="mb-3 hidden_div">
                      <label for="qID" class="form-label ">Question</label>
                      <input type="text" class="form-control " id="qID" />
                    </div>



                    <div class="mb-3">
                      <label for="update_qbody" class="form-label">Question</label>
                      <input type="text" class="form-control" id="update_qbody" />
                    </div>

                    <div class="row">
                      <div class="mb-3 col">
                        <label for="update-option1" class="form-label">Option-1</label>
                        <input type="text" class="form-control" id="update-option1" />
                      </div>
                      <div class="mb-3 col">
                        <label for="update-option2" class="form-label">Option-2</label>
                        <input type="text" class="form-control" id="update-option2" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="mb-3 col">
                        <label for="update-option3" class="form-label">Option-3</label>
                        <input type="text" class="form-control" id="update-option3" />
                      </div>

                      <div class="mb-3 col">
                        <label for="update-option4" class="form-label">Option-4</label>
                        <input type="text" class="form-control" id="update-option4" />
                      </div>
                    </div>

                    <p>Choose the correct answer<span>*</span></p>

                    <div class="row container">

                      <div class="form-check col">
                        <input required class="form-check-input" type="radio" name="update_radio" id="update-radio-option1"
                          value="0">
                        <label class="form-check-label" for="update-radio-option1">
                          Option 1
                        </label>
                      </div>
                      <div class="form-check col">
                        <input class="form-check-input" type="radio" name="update_radio" id="update-radio-option2"
                          value="1">
                        <label class="form-check-label" for="update-radio-option2">
                          Option 2
                        </label>
                      </div>
                      <div class="form-check col">
                        <input class="form-check-input" type="radio" name="update_radio" id="update-radio-option3"
                          value="2">
                        <label class="form-check-label" for="update-radio-option3">
                          Option 3
                        </label>
                      </div>
                      <div class="form-check col">
                        <input class="form-check-input" type="radio" name="update_radio" id="update-radio-option4"
                          value="3">
                        <label class="form-check-label" for="update-radio-option4">
                          Option 4
                        </label>
                      </div>
                    </div>




                    <div class="modal-footer">
                      <button id="close-btn-update" type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                      </button>
                      <button id="update-ques" type="submit" class="btn btn-primary">
                        Update
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>



        </div>

        <!-- table for showing all the data form database  -->

        <div class="container">
          <table class="table table-striped text-center">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Question</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody id="all-data-table">
               <!-- data is appended dynamically -->
            </tbody>
          </table>
        </div>


      </div>




      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
        <div id="container">
          <div id="title">
            <h1 class="h1">Dynamic Quiz</h1>
          </div>
          <br />
          <div id="quiz"></div>

          <div class="button" id="next"><a href="#">Next</a></div>

          <div class="button" id="prev"><a href="#">Prev</a></div>
          <div class="button" id="start"><a href="#">Start Over</a></div>
          <button id="chk-btn">Check Answer</button>
        </div>

        <!-- <button id="getdata" class="button">
          Click Me
        </button> -->
      </div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
        ...
      </div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
        ...
      </div>
    </div>
  </div>

  <script src="./bootstrap.js"></script>
  <script src="./jquery.js"></script>
  <script src="./script.js"></script>
</body>

</html>