var router = express.Router();
const path = require("path");
const multer = require("multer");
var express = require("express");
const UploadImages = require("../Model/UploadImages");

//---------------------->> STATIC PATH

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

module.exports = router;
