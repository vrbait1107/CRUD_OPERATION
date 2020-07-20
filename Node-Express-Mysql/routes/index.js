var express = require("express");
var router = express.Router();
const mysql = require("mysql");

const conn = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "crud_operation",
});

conn.connect(function (err) {
  if (err) throw err;
  console.log("Database Connected");
});

/* GET home page. */
router.get("/", function (req, res, next) {
  let sql = "SELECT * FROM employee_information";
  conn.query(sql, function (err, data) {
    if (err) throw err;
    res.render("index", {
      title: "Employee Management System",
      success: "",
      records: data,
    });
  });
});

router.post("/", function (req, res, next) {
  let name = req.body.name;
  let email = req.body.email;
  let etype = req.body.etype;
  let hourlyRate = req.body.hourlyRate;
  let totalHour = req.body.totalHour;
  let total = parseInt(req.body.totalHour) * parseInt(req.body.hourlyRate);

  let sql =
    "INSERT INTO employee_information (name, email, etype, hourlyRate, totalHour, total) VALUES(?,?,?,?,?,?)";

  conn.query(sql, [name, email, etype, hourlyRate, totalHour, total], function (
    err,
    data
  ) {
    if (err) throw err;
    let sql = "SELECT * FROM employee_information";
    conn.query(sql, function (err, data) {
      if (err) throw err;
      res.render("index", {
        title: "Employee Management System",
        success: "Data Insered Succesfully",
        records: data,
      });
    });
  });
});

module.exports = router;
