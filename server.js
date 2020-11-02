var socket = require("socket.io"),
  express = require("express"),
  https = require("https"),
  http = require("http"),
  logger = require("winston"),
  fs = require("fs");

logger.add(new logger.transports.Console());
logger.add(new logger.transports.File({ filename: "logfile.log" }));

logger.info("Socketio listening on port");

var app = express();
var http_server = http.createServer(app).listen(3000);

var https_server = https
  .createServer(
    {
      key: fs.readFileSync("/var/www/html/expresstravel.in/private.key"),
      cert: fs.readFileSync("/var/www/html/expresstravel.in/certificate.crt"),
    },
    app
  )
  .listen(3001);
// logger.info(http_server);
function emmitNewOrder(http_server) {
  var io = socket.listen(http_server);

  io.sockets.on("connection", function (socket) {
    socket.on("user_details", function (data) {
      io.emit("user_details", data);
    });
  });
}

emmitNewOrder(http_server);
emmitNewOrder(https_server);
