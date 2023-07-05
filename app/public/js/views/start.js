document.addEventListener("DOMContentLoaded", async () => {

});

// Configuración del contador de cuenta regresiva
let dataDb = '2023-07-27T23:59:00'
const fechaActual = new Date()
const fechaCierre = new Date(dataDb);
const contadorDate = document.getElementById('contadorDate');
document.getElementById("dateFichaje").textContent = fechaCierre.toLocaleString('es-VE');
const actualizarContador = (fechaObjetivo, contadorElemento) => {
    const ahora = new Date();
    const diferencia = fechaObjetivo - ahora;

    if (diferencia > 0) {
        const segundos = Math.floor((diferencia / 1000) % 60);
        const minutos = Math.floor((diferencia / 1000 / 60) % 60);
        const horas = Math.floor((diferencia / (1000 * 60 * 60)) % 24);
        const dias = Math.floor(diferencia / (1000 * 60 * 60 * 24));

        contadorElemento.innerHTML = dias + 'd ' + horas + 'h ' + minutos + 'm ' + segundos + 's';
        document.getElementById('particles-container').style.display = 'none';

    } else {
        contadorElemento.innerHTML = "0d 0h 0m 0s"
        // Cambiar color
        document.body.classList.add('count');
        // Mostrar particulas
        document.getElementById('particles-container').style.display = 'block';
        // Inicia la animación del cohete
        document.querySelector('.rocket').style.opacity = 1;
        document.querySelector('.rocket').classList.add('explote')
        // Reproducir sonido de cohete


    }
}


if (fechaActual >= fechaCierre) {
    actualizarContador(fechaCierre, contadorDate)
    console.log("entro a if")
} else {
    // Actualizar el contador cada segundo
    setInterval(function() {
        actualizarContador(fechaCierre, contadorDate);
    }, 1000);
    console.log("entro a else");
}
// Configuración de Particles.js
particlesJS('particles-container', {
    particles: {
        number: {
            value: 80,
            density: {
                enable: true,
                value_area: 800
            }
        },
        color: {
            value: '#dfd772'
        },
        shape: {
            type: 'circle',
            stroke: {
                width: 0,
                color: '#000000'
            },
            polygon: {
                nb_sides: 5
            },
            image: {
                src: '',
                width: 100,
                height: 100
            }
        },
        opacity: {
            value: 0.5,
            random: true,
            anim: {
                enable: false,
                speed: 1,
                opacity_min: 0.1,
                sync: false
            }
        },
        size: {
            value: 5,
            random: true,
            anim: {
                enable: false,
                speed: 40,
                size_min: 0.1,
                sync: false
            }
        },
        line_linked: {
            enable: false,
            distance: 150,
            color: '#ffff',
            opacity: 0.4,
            width: 1
        },
        move: {
            enable: true,
            speed: 6,
            direction: 'none',
            random: false,
            straight: false,
            out_mode: 'out',
            bounce: false,
            attract: {
                enable: false,
                rotateX: 600,
                rotateY: 1200
            }
        }
    },
    interactivity: {
        detect_on: 'canvas',
        events: {
            onhover: {
                enable: true,
                mode: 'grab'
            },
            onclick: {
                enable: true,
                mode: 'push'
            },
            resize: true
        },
        modes: {
            grab: {
                distance: 140,
                line_linked: {
                    opacity: 1
                }
            },
            bubble: {
                distance: 400,
                size: 40,
                duration: 2,
                opacity: 8,
                speed: 3
            },
            repulse: {
                distance: 200,
                duration: 0.4
            },
            push: {
                particles_nb: 4
            },
            remove: {
                particles_nb: 2
            }
        }
    },
    retina_detect: true
});