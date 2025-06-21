FROM node:24

# https://laracasts.com/discuss/channels/general-discussion/gulp-notify-error-in-notifier-error-in-plugin-gulp-notify-not-found-notify-send
RUN apt-get update -y \
    && apt-get install -y --no-install-recommends \
        libnotify-bin \
    && rm -r /var/lib/apt/lists/*

RUN mkdir -p /var/www/html
WORKDIR /var/www/html

CMD ["/bin/true"]
