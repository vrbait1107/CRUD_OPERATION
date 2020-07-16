var express = require("express");
var router = express.Router();
const Employee = require("../Model/Employee");

/* GET home page. */
router.get("/", function (req, res, next) {
  Employee.find({}, function (err, data) {
    if (err) throw err;
    res.render("index", { title: "EMPLOYEE RECORDS", records: data });
  });
});

// Form  Request
router.post("/", function (req, res, next) {
  employee = new Employee();
  employee.name = req.body.name;
  employee.email = req.body.email;
  employee.etype = req.body.etype;
  employee.hourlyRate = req.body.hourlyRate;
  employee.totalHour = req.body.totalHour;
  employee.total = parseInt(req.body.totalHour) * parseInt(req.body.hourlyRate);

  employee.save(function (err, data1) {
    if (err) throw err;
    Employee.find({}, function (err, data) {
      if (err) throw err;
      res.render("index", { title: "EMPLOYEE RECORDS", records: data });
    });
  });
});

// Filter Request

router.post("/search/", function (req, res, next) {
  let filterEmail = req.body.filterEmail;
  let filterName = req.body.filterName;

  if (filterEmail !== "" && filterName !== "") {
    var query = Employee.find({
      $and: [{ name: filterName }, { email: filterEmail }],
    });
  } else if (filterEmail !== "" && filterName == "") {
    var query = Employee.find({
      email: filterEmail,
    });
  } else if (filterEmail == "" && filterName !== "") {
    var query = Employee.find({
      name: filterName,
    });
  }

  query.exec(function (err, data) {
    if (err) throw err;
    res.render("index", { title: "EMPLOYEE RECORDS", records: data });
  });
});

module.exports = router;
