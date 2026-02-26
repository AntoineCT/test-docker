FROM antoinect/test-cours:version2

RUN echo '#!/bin/bash\nset -e\nservice apache2 start\nservice mysql start\n/bin/bash' > /entrypoint.sh && \
    chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]
