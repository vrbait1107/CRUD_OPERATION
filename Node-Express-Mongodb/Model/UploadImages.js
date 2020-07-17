const mongoose = require("mongoose");
const Schema = mongoose.Schema;

const UploadImages = new Schema({
  imageName: String,
});

module.exports = mongoose.model("UploadImages", UploadImages);
