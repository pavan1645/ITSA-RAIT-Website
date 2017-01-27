var bodyParser =			require("body-parser");
var express = 				require("express");
var app =					express();
var mongoose =				require("mongoose");
var passport =				require("passport");
var LocalStrategy =			require("passport-local").Strategy;
var passportLocalMongoose = require("passport-local-mongoose");
var expressSession =		require("express-session");
var User =					require("./models/user");


mongoose.Promise = global.Promise;
mongoose.connect("mongodb://localhost/demo");

app.use(expressSession({
	secret: "Megatroll loves cs",
	resave: false,
	saveUninitialized: false
}));
app.use(bodyParser.urlencoded({extended: true}));
app.set("view engine","ejs");
app.use(passport.initialize());
app.use(passport.session());
passport.use(new LocalStrategy(User.authenticate()));
passport.serializeUser(function(user, done) {
	done(null, user.id);
});
passport.deserializeUser(function(id, done) {
	User.findById(id, function(err, user) {
		done(err, user);
	});
});

app.get("/",function(req,res){
	res.render("home");
});

app.get("/secret",function(req,res){
	res.render("secret");
});

app.get("/register",function(req,res){
	res.render("register");
});

app.post("/register",function(req,res){
	User.register(new User({username: req.body.username}), req.body.password, function(err,user){
		if (err) {
			console.log(err);
			return res.render("register");
		}
		passport.authenticate("local")(req,res,function(){
			res.render("/secret");
		});
	});
});

app.listen(3000,function() {
	console.log("Serving on port 3000");
});