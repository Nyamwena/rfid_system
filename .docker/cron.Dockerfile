FROM cron

COPY scheduler.cron /etc/cron.d/scheduler

RUN chmod 0644 /etc/cron.d/scheduler

CMD ["cron", "-f"]
