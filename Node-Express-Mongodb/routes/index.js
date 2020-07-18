var express = require("express");
var router = express.Router();
const Employee = require("../Model/Employee");

//----------------------->> HOME PAGE

router.get("/", function (req, res, next) {
  Employee.find({}, function (err, data) {
    if (err) throw err;
    res.render("index", {
      title: "EMPLOYEE RECORDS",
      records: data,
      success: "",
    });
  });
});

//----------------------->> SHOW RECORDS DETAILS ON HOME PAGE

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
      res.render("index", {
        title: "EMPLOYEE RECORDS",
        records: data,
        success: "Record Inserted Successfully",
      });
    });
  });
});

//----------------------->> DELETE REQUEST

router.get("/delete/:id", function (req, res, next) {
  const id = req.params.id;

  Employee.findByIdAndDelete(id, function (err, data) {
    if (err) throw err;
    Employee.find({}, function (err, data) {
      if (err) throw err;
      res.render("index", {
        title: "EMPLOYEE RECORDS",
        records: data,
        success: "Successfully Record Deleted",
      });
    });
  });
});

//----------------------->> EDIT REQUEST

router.get("/edit/:id", function (req, res, next) {
  const id = req.params.id;

  Employee.findById(id, function (err, data) {
    res.render("edit", { title: "Edit Employee Records", editData: data });
  });
});

//----------------------->> UPDATE RECORDS

router.post("/update/", function (req, res, next) {
  let id = req.body.id;
  let name = req.body.name;
  let email = req.body.email;
  let etype = req.body.etype;
  let hourlyRate = req.body.hourlyRate;
  let totalHour = req.body.totalHour;
  let total = parseInt(req.body.totalHour) * parseInt(req.body.hourlyRate);

  Employee.findByIdAndUpdate(
    id,
    { name, email, etype, hourlyRate, totalHour, total },
    function (err, data) {
      Employee.find({}, function (err, data) {
        if (err) throw err;
        res.render("index", {
          title: "EMPLOYEE RECORDS",
          records: data,
          success: "Record Successfully Updated",
        });
      });
    }
  );
});

module.exports = router;
