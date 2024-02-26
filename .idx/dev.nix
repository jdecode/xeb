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
    previews = [
      {
        
      }
    ];
  };
  services.docker.enable = true;
}
