var express = require("express");
var router = express.Router();
const Employee = require("../Model/Employee");
const multer = require("multer");
const path = require("path");
const UploadImages = require("../Model/UploadImages");

router.use(express.static(__dirname + "./public/"));

// ---------------------->> MULTER DISKSTORAGE

const Storage = multer.diskStorage({
  destination: "./public/uploads/",
  filename: (req, file, cb) => {
    cb(
      null,
      file.fieldname + "_" + Date.now() + path.extname(file.originalname)
    );
  },
});

// ---------------------->> MULTER MIDDLEWARE

const upload = multer({
  storage: Storage,
}).single("file");

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

// ----------------------->> SHOW RECORDS DETAILS

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

// ----------------------->> FILTER RECORDS

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
    res.render("index", {
      title: "EMPLOYEE RECORDS",
      records: data,
      success: "",
    });
  });
});

// ------------------------->> DELETE REQUEST

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

// ------------------------->> EDIT REQUEST

router.get("/edit/:id", function (req, res, next) {
  const id = req.params.id;

  Employee.findById(id, function (err, data) {
    res.render("edit", { title: "Edit Employee Records", editData: data });
  });
});

// ------------------------->> UPDATE RECORDS

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

//-------------------------->> GET UPLOAD FILE

router.get("/upload", upload, function (req, res) {
  UploadImages.find({}, function (err, data) {
    res.render("upload", { title: "upload File", success: "", records: data });
  });
});

//-------------------------->> POST UPLOAD FILE

router.post("/upload", upload, function (req, res) {
  const imagesName = req.file.filename;

  const uploadImages = new UploadImages();
  uploadImages.imageName = imagesName;

  uploadImages.save(function (err, data) {
    if (err) throw err;

    UploadImages.find({}, function (err1, data1) {
      res.render("upload", {
        title: "upload File",
        success: "file successfully uploaded",
        records: data1,
      });
    });
  });
});

//--------------------------->> SHOW IMAGES ON HTML FILE

module.exports = router;
