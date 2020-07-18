const mongoose = require("mongoose");
const Schema = mongoose.Schema;

const Employee = new Schema({
  name: String,
  email: String,
  etype: String,
  hourlyRate: Number,
  totalHour: Number,
  total: Number,
  profileImage: String,
});

module.exports = mongoose.model("Employee", Employee);
