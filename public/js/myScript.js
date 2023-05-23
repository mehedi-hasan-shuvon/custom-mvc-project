let app = angular.module("myApp", []);

app.controller("myCtrl", ($scope, $http) => {
  var url = window.location.href;
  var baseUrl = url.split("app")[0];
  const coreURL = "http://localhost/mvc-test/public/";
  console.log(baseUrl);
  $scope.inHome = false;

  if (url === baseUrl) {
    $scope.inHome = true;
  }

  $scope.deleteModalOpen = (userId) => {
    $scope.deleteingId = userId;
  };

  //cancel delete
  $scope.cancleDelete = () => {
    $scope.deleteingId = "";
  };

  //confirm delete
  $scope.confirmDelete = () => {
    if ($scope.deleteingId !== "") {
      $scope.deleteingId = parseInt($scope.deleteingId);
      var data = {
        id: $scope.deleteingId,
      };

      let url = coreURL + "home/deleteUser/" + $scope.deleteingId;
      $http.post(url).then(
        (response) => {
          console.log("deleted");
        },
        (error) => {
          console.log(error);
        }
      );
    } else {
      alert("Please select a user to delete");
    }
  };

  // add new student
  $scope.addNewStudent = () => {
    console.log($scope.studentName, $scope.age, $scope.selectedCity);

    if (
      $scope.studentName !== "" &&
      $scope.age !== "" &&
      typeof $scope.selectedCity !== "undefined"
    ) {
      // send the student name, age and city to url

      let url = coreURL + "home/addUser";
      var data = {
        name: $scope.studentName,
        age: $scope.age,
        city: $scope.selectedCity,
      };

      $http.post(url, data).then(
        (response) => {
          console.log(response);
          // $scope.studentName = "";
          // $scope.age = "";
          // $scope.selectedCity = "";
          // alert("Student added successfully");
        },
        (error) => {
          console.log(error);
        }
      );
    } else {
      alert("Please fill all the fields");
    }
  };
});
