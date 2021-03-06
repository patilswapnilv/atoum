<?php

namespace atoum\atoum\report\fields\runner\result;

class logo extends cli
{
    public function __toString()
    {
        if ($this->success) {
            return "
              \033[48;5;16m  \033[0m                                 \033[48;5;16m  \033[0m
            \033[48;5;16m    \033[0m                                 \033[48;5;16m   \033[0m
            \033[48;5;16m  \033[48;5;231m \033[48;5;120m \033[48;5;16m  \033[0m                             \033[48;5;16m  \033[48;5;120m \033[48;5;231m \033[48;5;16m \033[0m
            \033[48;5;16m  \033[48;5;231m \033[48;5;120m   \033[48;5;16m                             \033[48;5;120m   \033[48;5;231m \033[48;5;16m \033[0m
            \033[48;5;16m  \033[48;5;231m \033[48;5;120m            \033[48;5;16m  \033[48;5;157m       \033[48;5;16m  \033[48;5;120m            \033[48;5;231m \033[48;5;16m \033[0m
	    \033[48;5;16m  \033[48;5;34m           \033[48;5;16m  \033[48;5;157m \033[48;5;120m         \033[48;5;157m \033[48;5;16m  \033[48;5;34m           \033[48;5;16m \033[0m
              \033[48;5;16m           \033[48;5;157m \033[48;5;120m             \033[48;5;157m \033[48;5;16m           \033[0m
                       \033[48;5;16m  \033[48;5;157m \033[48;5;120m             \033[48;5;157m \033[48;5;16m  \033[0m
                      \033[48;5;16m   \033[48;5;157m \033[48;5;120m   \033[48;5;16m  \033[48;5;120m   \033[48;5;16m  \033[48;5;120m   \033[48;5;157m \033[48;5;16m   \033[0m
                    \033[48;5;16m  \033[48;5;83m \033[48;5;16m  \033[48;5;157m \033[48;5;120m   \033[48;5;16m  \033[48;5;120m   \033[48;5;16m  \033[48;5;120m   \033[48;5;157m \033[48;5;16m  \033[48;5;83m \033[48;5;16m  \033[0m
                    \033[48;5;16m     \033[48;5;157m \033[48;5;120m             \033[48;5;157m \033[48;5;16m     \033[0m
                       \033[48;5;16m    \033[48;5;157m \033[48;5;120m         \033[48;5;157m \033[48;5;16m    \033[0m
                         \033[48;5;16m  \033[48;5;157m \033[48;5;120m         \033[48;5;157m \033[48;5;16m  \033[0m
                         \033[48;5;16m  \033[48;5;83m           \033[48;5;16m  \033[0m
                         \033[48;5;16m  \033[48;5;83m  \033[48;5;16m   \033[48;5;83m \033[48;5;16m   \033[48;5;83m  \033[48;5;16m  \033[0m
                           \033[48;5;16m  \033[48;5;83m       \033[48;5;16m  \033[0m
                             \033[48;5;16m       \033[0m
            \033[0m" . PHP_EOL;
        } else {
            return "
              \033[48;5;16m  \033[0m                                 \033[48;5;16m  \033[0m
            \033[48;5;16m    \033[0m                                 \033[48;5;16m   \033[0m
            \033[48;5;16m  \033[48;5;231m \033[48;5;211m \033[48;5;16m  \033[0m                             \033[48;5;16m  \033[48;5;211m \033[48;5;231m \033[48;5;16m \033[0m
            \033[48;5;16m  \033[48;5;231m \033[48;5;211m   \033[48;5;16m                             \033[48;5;211m   \033[48;5;231m \033[48;5;16m \033[0m
            \033[48;5;16m  \033[48;5;231m \033[48;5;211m            \033[48;5;16m  \033[48;5;218m       \033[48;5;16m  \033[48;5;211m            \033[48;5;231m \033[48;5;16m \033[0m
            \033[48;5;16m  \033[48;5;124m           \033[48;5;16m  \033[48;5;218m \033[48;5;204m         \033[48;5;218m \033[48;5;16m  \033[48;5;124m           \033[48;5;16m \033[0m
              \033[48;5;16m           \033[48;5;218m \033[48;5;204m             \033[48;5;218m \033[48;5;16m           \033[0m \033[0m
                       \033[48;5;16m  \033[48;5;218m \033[48;5;204m             \033[48;5;218m \033[48;5;16m \033[48;5;16m \033[0m
                      \033[48;5;16m   \033[48;5;218m \033[48;5;204m   \033[48;5;16m  \033[48;5;204m   \033[48;5;16m  \033[48;5;204m   \033[48;5;218m \033[48;5;16m   \033[0m
                    \033[48;5;16m  \033[48;5;197m \033[48;5;16m  \033[48;5;218m \033[48;5;204m   \033[48;5;16m  \033[48;5;204m   \033[48;5;16m  \033[48;5;204m   \033[48;5;218m \033[48;5;16m  \033[48;5;197m \033[48;5;16m  \033[0m
                    \033[48;5;16m     \033[48;5;218m \033[48;5;204m             \033[48;5;218m \033[48;5;16m     \033[0m
                       \033[48;5;16m    \033[48;5;218m \033[48;5;204m         \033[48;5;218m \033[48;5;16m    \033[0m
                         \033[48;5;16m  \033[48;5;218m \033[48;5;204m         \033[48;5;218m \033[48;5;16m  \033[0m
                         \033[48;5;16m  \033[48;5;197m \033[48;5;197m \033[48;5;197m \033[48;5;197m \033[48;5;197m \033[48;5;197m \033[48;5;197m \033[48;5;197m \033[48;5;197m \033[48;5;197m \033[48;5;197m \033[48;5;16m  \033[0m
                         \033[48;5;16m  \033[48;5;197m \033[48;5;197m \033[48;5;16m   \033[48;5;197m \033[48;5;16m   \033[48;5;197m \033[48;5;197m \033[48;5;16m  \033[0m
                           \033[48;5;16m  \033[48;5;197m \033[48;5;197m \033[48;5;197m \033[48;5;197m \033[48;5;197m \033[48;5;197m \033[48;5;197m \033[48;5;16m  \033[0m
                             \033[48;5;16m       \033[0m
            \033[0m" . PHP_EOL;
        }
    }
}
