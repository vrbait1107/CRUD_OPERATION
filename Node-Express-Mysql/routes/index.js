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

//---------------------->> RENDER HOME PAGE

router.get("/", function (req, res, next) {
  res.render("index", { title: "Employee Management", success: "" });
});

//---------------------->> READ OPERATION

router.post("/read", function (req, res, next) {
  let sql = "SELECT * FROM employee_information";
  conn.query(sql, function (err, data) {
    if (err) throw err;
    res.send({ records: data });
  });
});

//---------------------->> CREATE OPERATION

router.post("/create", function (req, res, next) {
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
    res.send("Data Inserted Successfully");
  });
});

//---------------------->> DELETE OPERATION

router.post("/delete", function (req, res, next) {
  let id = req.body.deleteId;

  let sql = "DELETE FROM employee_information WHERE id = ?";
  conn.query(sql, [id], function (err, data) {
    if (err) throw err;
    res.send("Data Deleted Successfully");
  });
});

//---------------------->> EDIT OPERATION

router.post("/edit", function (req, res, next) {
  let id = req.body.editId;

  let sql = "SELECT * FROM employee_information WHERE id = ?";

  conn.query(sql, [id], function (err, data) {
    if (err) throw err;
    res.send({ employee: data });
  });
});

//---------------------->> UPDATE  OPERATION

router.post("/update", function (req, res, next) {
  let name = req.body.updateName;
  let email = req.body.updateEmail;
  let etype = req.body.updateEtype;
  let hourlyRate = req.body.updateHourlyRate;
  let totalHour = req.body.updateTotalHour;
  let total = parseInt(totalHour) * parseInt(hourlyRate);
  let id = req.body.hiddenId;

  let sql =
    "UPDATE employee_information SET name = ?, email = ?, etype = ?, hourlyRate = ?, totalHour = ?, total = ? WHERE id = ?";

  conn.query(
    sql,
    [name, email, etype, hourlyRate, totalHour, total, id],
    function (err, data) {
      if (err) throw err;
      res.send("Data Updated Successfully");
    }
  );
});

module.exports = router;
