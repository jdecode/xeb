{pkgs}: {
  channel = "stable-23.11";
  packages = [
    pkgs.docker
    pkgs.php
    pkgs.nodejs
  ];
  idx.extensions = [
    "ms-azuretools.vscode-docker"
  ];
  idx.previews = {
    enable = true;
    previews = [
      {
        command = [
          "docker"
          "compose"
          "up"
          "-d"
        ];
        manager = "web";
        id = "web";
      }
    ];
  };
  services.docker.enable = true;
}
