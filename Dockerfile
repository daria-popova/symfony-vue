FROM webdevops/php-nginx-dev:7.3

# Install node
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
RUN apt-get install -y nodejs

# Install yarn
RUN npm install --global yarn
