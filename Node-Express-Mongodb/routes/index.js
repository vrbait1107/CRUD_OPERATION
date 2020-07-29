var express = require("express");
var router = express.Router();
const Employee = require("../Model/Employee");
const multer = require("multer");
const path = require("path");

router.use(express.static(__dirname + "./public/"));

const Storage = multer.diskStorage({
  destination: "./public/profileImage/",
  filename: (req, file, cb) => {
    cb(
      null,
      file.fieldname + "_" + Date.now() + path.extname(file.originalname)
    );
  },
});

const upload = multer({
  storage: Storage,
}).single("profileImage");

//----------------------->> Read Operation

router.get("/", function (req, res, next) {
  res.render("index", {
    title: "EMPLOYEE RECORDS",
    success: "",
  });
});

//----------------------->> Read Operation

router.post("/read", function (req, res, next) {
  Employee.find({}, function (err, data) {
    if (err) throw err;
    res.send({ records: data });
  });
});

//----------------------->> Create Operation.

router.post("/create", upload, function (req, res, next) {
  employee = new Employee();
  employee.name = req.body.name;
  employee.email = req.body.email;
  employee.etype = req.body.etype;
  employee.hourlyRate = req.body.hourlyRate;
  employee.totalHour = req.body.totalHour;
  employee.total = parseInt(req.body.totalHour) * parseInt(req.body.hourlyRate);
  employee.profileImage = req.file.filename;

  if (!employee.profileImage) {
    employee.profileImage = "defaultUser.png";
  }

  employee.save(function (err, data) {
    if (err) throw err;
    res.send("Data Inserted Successfully");
  });
});

//----------------------->> DELETE REQUEST

router.post("/delete", function (req, res, next) {
  const id = req.body.deleteId;

  Employee.findByIdAndDelete(id, function (err, data) {
    if (err) throw err;
    res.send("Data Successfully Deleted");
  });
});

//----------------------->> EDIT REQUEST

router.post("/edit", function (req, res, next) {
  const id = req.body.editId;

  Employee.findById(id, function (err, data) {
    res.send({ employee: data });
  });
});

//----------------------->> UPDATE RECORDS

router.post("/update", upload, function (req, res, next) {
  let id = req.body.hiddenId;
  let name = req.body.updateName;
  let email = req.body.updateEmail;
  let etype = req.body.updateEtype;
  let hourlyRate = req.body.updateHourlyRate;
  let totalHour = req.body.updateTotalHour;
  let total = parseInt(hourlyRate) * parseInt(totalHour);
  let profileImage = req.file.filename;

  if (!profileImage) {
    profileImage = "defaultUser.png";
  }

  Employee.findByIdAndUpdate(
    id,
    { name, email, etype, hourlyRate, totalHour, total, profileImage },
    function (err, data) {
      res.send("Data updated Successfully");
    }
  );
});

module.exports = router;
