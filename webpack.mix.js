const ftpConfig = {
  host: "",
  port: "21",
  user: "",
  password: "",
  targetDirectory: "",
  ignore: [
    ".gitignore",
    ".git",
    ".DS_Store",
    "sources",
    "node_modules",
    "mix-manifest.json",
    "package-lock.json",
    "package.json",
    "webpack.mix.js"
  ]
};

let mix = require("laravel-mix"),
  fs = require("fs"),
  notifier = require("node-notifier"),
  Ftp = require("ftp"),
  remote = new Ftp();

const watchFiles = () => {
  fs.watch("./", { recursive: true }, (event, filename) => {
    if (!ignoreFile(filename)) {
      if (!fs.existsSync(filename)) {
        deleteFile(remote, filename);
      } else {
        const filePath = filename.replace(/[^\/]*$/, "");
        if (filePath.length) {
          createPath(remote, filePath);
        }
        uploadFile(remote, filename);
      }
    }
  });
};

const ignoreFile = filename => {
  let shouldIgnore = false;
  ftpConfig.ignore.forEach(item => {
    if (filename.includes(item)) shouldIgnore = true;
  });
  return shouldIgnore;
};

const createPath = (remote, filePath) => {
  remote.mkdir(`${ftpConfig.targetDirectory}${filePath}`, true, error => {
    if (error) {
      _notify.error(
        "Remote path creation error",
        "Something went wrong while creating path on remote.",
        error
      );
    } else {
      console.info(
        "Created directory:",
        `${ftpConfig.targetDirectory}${filePath}`
      );
    }
  });
};

const uploadFile = (remote, filename) => {
  remote.put(filename, `${ftpConfig.targetDirectory}${filename}`, error => {
    if (error) {
      _notify.error(
        "File upload faile",
        "Something went wrong while uploading tp remote.",
        error
      );
    }
    console.info("Uploaded:", filename);
  });
};

const deleteFile = (remote, filename) => {
  remote.delete(`${ftpConfig.targetDirectory}${filename}`, error => {
    if (error) {
      _notify.error(
        "Remote file delete error",
        "Something went wrong while deleting file on remote.",
        error
      );
    }
    console.info("Deleted:", `${ftpConfig.targetDirectory}${filename}`);
  });
};

if (ftpConfig.host.length) {
  remote.on("ready", () => {
    watchFiles();
  });

  remote.connect(ftpConfig);
}

mix.autoload({
  jquery: ["$", "window.jQuery", "jQuery"]
});
mix
  .options({
    processCssUrls: false,
    postCss: [
      require("autoprefixer")({
        grid: true
      })
    ],
    uglify: {
      uglifyOptions: {
        compress: true
      }
    }
  })
  .sourceMaps(true, "source-map");
mix.js("sources/js/main.js", "js/main.js");
mix.sass("sources/scss/style.scss", "style.css", {
  sassOptions: {
    outputStyle: "compressed"
  }
});
mix.sass("sources/scss/admin.scss", "admin.css", {
  sassOptions: {
    outputStyle: "compressed"
  }
});
mix.disableSuccessNotifications();

const _notify = {
  error: (title, message, log) => {
    notifier.notify({
      type: "error",
      title: title,
      message: message,
      icon: __dirname + "/images/logo.png"
    });
    console.log(log);
  }
};
