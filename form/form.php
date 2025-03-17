<?php
include "../tech/api/connect.php";
?>
<div class="container" style="padding-top: 20px;">
    <div class="spinner-grow text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <div class="spinner-grow text-secondary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <div class="spinner-grow text-success" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <div class="spinner-grow text-danger" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <div class="spinner-grow text-warning" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <div class="spinner-grow text-info" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <div class="spinner-grow text-light" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <div class="spinner-grow text-dark" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <div class=" text-center">
        <div class="card-body shadow-lg p-4 rounded">
            <div class="d-flex align-items-start">
                <!-- Logo/Image -->
                <img src="img/final_tcea.jpg" alt="College Logo" class="me-3" style="width: 60px; height: 60px;">

                <!-- Text Section -->
                <div class="d-flex flex-column">
                    <!-- College Name in Bold -->
                    <span class="fw-bold fs-5">TECHNO COLLEGE OF ENGINEERING AGARTALA</span>

                    <!-- Subtitle Below -->
                    <span class="text-muted fs-6 text-start">EduCover Page...</span>
                </div>
            </div>
            <div class="text-center"> <b style="font-size: 20px;">
                    <i class="fa-solid fa-circle-info"></i> Fill in Your Details Here
                </b></div>
            <div style="text-align: left;"><b><i class="fa-solid fa-users"></i> Student
                    Details</b>
                <hr>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="form-floating">
                        <input class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                            ng-model="std_id" ng-blur="checkStudentID()">
                        <label for="floatingTextarea"><i class="fa-solid fa-users-gear"></i>
                            Student ID </label>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-floating">
                        <input class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                            ng-model="tu_roll">
                        <label for="floatingTextarea"><i class="fa-solid fa-building-columns"></i>
                            TU Roll No </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 mb-3">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example"
                            ng-model="title">
                            <option selected></option>
                            <option>Mr.</option>
                            <option>Miss.</option>
                            <option>Mrs.</option>
                            <option>Sri</option>
                            <option>Smt.</option>
                        </select>
                        <label for="floatingTextarea">Honorific
                            Title </label>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-floating">
                        <input class="form-control" style="text-transform: capitalize;" ng-model="name">
                        <label for="floatingTextarea"><i class="fa-solid fa-user"></i>
                            Name </label>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example"
                            ng-model="sem">
                            <option selected></option>
                            <option>1st</option>
                            <option>2nd</option>
                            <option>3rd</option>
                            <option>4th</option>
                            <option>5th</option>
                            <option>6th</option>
                            <option>7th</option>
                            <option>8th</option>
                        </select>
                        <label for="floatingTextarea">Semester </label>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelectGrid" aria-label="Select Department"
                            ng-model="std_dept">
                            <option selected></option>
                            <?php
                            $sql = "SELECT dept_name FROM dept";
                            $result = $con->query($sql);
                            while ($row = $result->fetch_assoc()) { ?>
                                <option><?php echo $row['dept_name']; ?></option>
                            <?php } ?>
                        </select>
                        <label for="floatingTextarea"><i class="fa-solid fa-building"></i>
                            Department </label>
                    </div>
                </div>
                <div class="col-lg-2 mb-3">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example"
                            ng-model="course" ng-change="subjects_view();">
                            <option selected></option>
                            <option>B.Tech</option>
                            <option>Diploma</option>
                        </select>
                        <label for="floatingTextarea">Course
                            Code </label>
                    </div>
                </div>

                <div class="col-lg-4 mb-3">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example"
                            ng-model="subjects" ng-change="subjects_code_view();">
                            <option selected></option>
                            <option ng-repeat="s in subjectss_data">{{s.subjects}}</option>
                        </select>
                        <label for="floatingTextarea"><i class="fa-brands fa-discourse"></i>
                            Subject
                            Title </label>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-3 mb-3">
                    <div class="form-floating">
                        <input class="form-control" ng-model="code" readonly>
                        <label for="floatingTextarea">Subject
                            Code </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example"
                            ng-model="page_type">
                            <option selected></option>
                            <option>Assignment</option>
                            <option>Assignment-I</option>
                            <option>Assignment-II</option>
                            <option>Lab Assignment</option>
                            <option>Lab Assignment-I</option>
                            <option>Lab Assignment-II</option>
                        </select>
                        <label for="floatingTextarea">Front Page
                            Types </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example"
                            ng-model="section">
                            <option selected></option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>D</option>
                        </select>
                        <label for="floatingTextarea"> Section</label>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="form-floating">
                        <input class="form-control" type="date" ng-model="dos">
                        <label for="floatingTextarea"><i class="fa-solid fa-calendar"></i>
                            Submission
                            Date </label>
                    </div>
                </div>
            </div>
            <div style="text-align: left;"><b><i class="fa-solid fa-chalkboard-user"></i> Submitted Faculty
                    Information</b>
                <hr>
            </div>
            <div class="row">
                <!-- Department Selection -->
                <div class="col-lg-4 mb-3">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelectGrid" aria-label="Select Department"
                            ng-model="f_dept" ng-change="tech_view();">
                            <option selected></option>
                            <?php
                            $sql = "SELECT dept_name FROM dept";
                            $result = $con->query($sql);
                            while ($row = $result->fetch_assoc()) { ?>
                                <option><?php echo $row['dept_name']; ?></option>
                            <?php } ?>
                        </select>
                        <label for="floatingTextarea"><i class="fa-solid fa-building"></i> Department</label>
                    </div>
                </div>

                <!-- Faculty Name Selection -->
                <div class="col-lg-6 mb-3">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelectGrid" aria-label="Select Faculty"
                            ng-model="f_name" ng-change="designation_view();">
                            <option selected></option>
                            <option ng-repeat="f in tech_data">{{f.teacher}}</option>
                        </select>
                        <label for="floatingTextarea"><i class="fa-solid fa-user"></i> Faculty Name</label>
                    </div>
                </div>

                <!-- Designation Display -->
                <div class="col-lg-2 mb-3">
                    <div class="form-floating">
                        <input class="form-control" ng-model="f_designation" readonly>
                        <label for="floatingTextarea">Designation</label>
                    </div>
                </div>
            </div>

            <div>
                <button type="button" class="btn btn-success" ng-click="std_entry();"><i class="fa-solid fa-print"></i>
                    Print</button>
                <button type="button" class="btn btn-danger" ng-click="clearAll()">
                    <i class="fa-solid fa-circle-xmark"></i> Clear All
                </button>

            </div>
            <br><br>
            <div class="row">
                <div class="col-lg-12">
                    <p class="mb-0">
                        <i class="fa-solid fa-copyright"></i> 2025
                        <a href="https://www.linkedin.com/in/sani-shil" class="text-dark text-decoration-none"
                            target="_blank">
                            Mr. Sani Shil
                        </a>

                        Fueled by coffee & code. Found a bug?
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSf90Wk3_laRB6Y_gRGbvoTj1HRs7Eqe_LpAAskAI78iP6zCnw/viewform?usp=dialog"
                            class="text-info text-decoration-none" target="_blank">Squash it here.</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$con->close();
?>