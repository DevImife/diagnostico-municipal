<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro de Planteles | IMIFE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --ink: #000000;
            --wine: #9f2241;
            --copper: #965f36;
            --gold: #bc955b;
            --sand: #ddc8a4;
            --paper: #f7f1e8;
            --mist: #efe4d1;
        }

        body {
            background:
                radial-gradient(circle at top left, rgba(221, 200, 164, 0.22), transparent 28%),
                radial-gradient(circle at 82% 18%, rgba(159, 34, 65, 0.10), transparent 24%),
                linear-gradient(180deg, #fbf8f3 0%, #f3ede3 100%);
            color: #1a1a1a;
            font-family: "Segoe UI", "Helvetica Neue", sans-serif;
        }

        .display-title {
            font-family: Georgia, "Times New Roman", serif;
            letter-spacing: -0.03em;
        }

        .hero-shell {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(150, 95, 54, 0.16);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.96), rgba(248, 242, 233, 0.94)),
                #fff;
            box-shadow:
                0 30px 70px rgba(0, 0, 0, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.85);
        }

        .hero-shell::before {
            content: "";
            position: absolute;
            inset: -15% auto auto -10%;
            width: 20rem;
            height: 20rem;
            border-radius: 9999px;
            background: radial-gradient(circle, rgba(221, 200, 164, 0.34), transparent 70%);
            pointer-events: none;
        }

        .hero-shell::after {
            content: "";
            position: absolute;
            right: -5rem;
            bottom: -5rem;
            width: 18rem;
            height: 18rem;
            border-radius: 9999px;
            background: radial-gradient(circle, rgba(159, 34, 65, 0.10), transparent 72%);
            pointer-events: none;
        }

        .glass-card {
            border: 1px solid rgba(150, 95, 54, 0.14);
            background: rgba(255, 255, 255, 0.72);
            backdrop-filter: blur(12px);
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.06);
        }

        .accent-line {
            height: 1px;
            background: linear-gradient(90deg, rgba(159, 34, 65, 0), rgba(159, 34, 65, 0.45), rgba(188, 149, 91, 0));
        }

        .metric-card {
            border: 1px solid rgba(0, 0, 0, 0.06);
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.96), rgba(248, 244, 238, 0.92));
        }

        .feature-card {
            position: relative;
            border: 1px solid rgba(150, 95, 54, 0.12);
            background: rgba(255, 255, 255, 0.9);
            transition: transform 180ms ease, box-shadow 180ms ease, border-color 180ms ease;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            border-color: rgba(159, 34, 65, 0.26);
            box-shadow: 0 20px 35px rgba(80, 34, 47, 0.08);
        }

        .feature-card::before {
            content: "";
            position: absolute;
            inset: 0 auto 0 0;
            width: 4px;
            border-radius: 9999px;
            background: linear-gradient(180deg, var(--wine), var(--gold));
        }

        .hero-grid {
            background-image:
                linear-gradient(rgba(150, 95, 54, 0.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(150, 95, 54, 0.06) 1px, transparent 1px);
            background-size: 36px 36px;
            background-position: center;
        }
    </style>
</head>

<body class="min-h-screen">
    <div class="mx-auto flex min-h-screen max-w-7xl flex-col px-5 py-5 sm:px-8 lg:px-10">
        <header class="mb-8 flex items-start justify-between">
            <div class="flex items-center gap-4">
                <div
                    class="flex h-14 w-14 items-center justify-center rounded-2xl border border-[rgba(150,95,54,0.18)] bg-white shadow-sm">
                    <img src="{{ asset('images/vino.png') }}" alt="Estado de México" class="h-10 w-10 object-contain" />
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.28em] text-[var(--wine)]">IMIFE</p>
                    <p class="text-sm text-[#5c544a]">Infraestructura física educativa</p>
                </div>
            </div>

            <a href="{{ route('login') }}"
                class="rounded-full border border-[rgba(159,34,65,0.18)] bg-[var(--wine)] px-5 py-2.5 text-sm font-semibold text-white shadow-[0_10px_24px_rgba(159,34,65,0.18)] transition hover:translate-y-[-1px] hover:bg-[#8f203b]">
                Iniciar sesión
            </a>
        </header>

        <main class="flex-1">
            <section class="hero-shell hero-grid rounded-[2rem] px-6 py-8 sm:px-10 sm:py-12 lg:px-14 lg:py-14">
                <div class="grid gap-10 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
                    <div class="relative z-10">
                        <div
                            class="mb-6 inline-flex items-center gap-3 rounded-full border border-[rgba(188,149,91,0.22)] bg-white/80 px-4 py-2 text-sm text-[#5d5145] shadow-sm">
                            <span class="h-2.5 w-2.5 rounded-full bg-[var(--gold)]"></span>
                            Plataforma para registrar y dar seguimiento a planteles escolares
                        </div>

                        <h1
                            class="display-title max-w-4xl text-5xl font-bold leading-[0.95] text-[var(--ink)] sm:text-6xl lg:text-7xl">
                            Sistema para los diagnósticos municipales de infraestructura física educativa
                        </h1>

                        <p class="mt-6 max-w-2xl text-base leading-8 text-[#564d44] sm:text-lg">
                            Un entorno institucional, claro y confiable para concentrar información de escuelas,
                            validar planteles y organizar encuestas técnicas con una experiencia moderna y ordenada.
                        </p>

                        <div class="mt-8 flex flex-wrap items-center gap-4">
                            <div
                                class="rounded-2xl border border-[rgba(150,95,54,0.12)] bg-white/85 px-5 py-4 shadow-sm">
                                <p class="text-xs uppercase tracking-[0.26em] text-[var(--wine)]">Cobertura</p>
                                <p class="mt-2 text-lg font-semibold text-[#241f1a]">Registro de escuelas y planteles
                                </p>
                            </div>
                            <div
                                class="rounded-2xl border border-[rgba(150,95,54,0.12)] bg-white/85 px-5 py-4 shadow-sm">
                                <p class="text-xs uppercase tracking-[0.26em] text-[var(--wine)]">Objetivo</p>
                                <p class="mt-2 text-lg font-semibold text-[#241f1a]">Captura clara, trazable y segura
                                </p>
                            </div>
                        </div>

                        <div class="mt-10 grid gap-4 sm:grid-cols-3">
                            <div class="metric-card rounded-2xl p-5 shadow-sm">
                                <p class="text-xs uppercase tracking-[0.26em] text-[var(--wine)]">Paso 1</p>
                                <p class="mt-3 text-xl font-semibold text-[#241f1a]">Identificación del plantel</p>
                            </div>
                            <div class="metric-card rounded-2xl p-5 shadow-sm">
                                <p class="text-xs uppercase tracking-[0.26em] text-[var(--copper)]">Paso 2</p>
                                <p class="mt-3 text-xl font-semibold text-[#241f1a]">Captura de evidencia y datos</p>
                            </div>
                            <div class="metric-card rounded-2xl p-5 shadow-sm">
                                <p class="text-xs uppercase tracking-[0.26em] text-[var(--gold)]">Paso 3</p>
                                <p class="mt-3 text-xl font-semibold text-[#241f1a]">Consulta y seguimiento</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative z-10">
                        <div class="glass-card rounded-[1.75rem] p-5 sm:p-6">
                            <div
                                class="rounded-[1.5rem] bg-[linear-gradient(145deg,#2a2521_0%,#120f0d_100%)] p-6 text-white">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs uppercase tracking-[0.3em] text-[var(--sand)]">Panel
                                            institucional</p>
                                        <h2 class="mt-3 text-2xl font-semibold">Escuelas, evidencias y control
                                            documental</h2>
                                    </div>
                                    <div
                                        class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/10 text-[var(--sand)]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4 6h16M4 12h16M4 18h10" />
                                        </svg>
                                    </div>
                                </div>

                                <div class="accent-line my-6"></div>

                                <div class="grid gap-4">
                                    <div class="rounded-2xl bg-white/8 p-4">
                                        <p class="text-xs uppercase tracking-[0.24em] text-[var(--sand)]">Gestión
                                            centralizada</p>
                                        <p class="mt-2 text-sm leading-7 text-white/78">
                                            Diseñado para consolidar información clave de cada plantel, desde datos
                                            generales
                                            hasta evidencia fotográfica y necesidades de mejora.
                                        </p>
                                    </div>

                                    <div class="grid gap-4 sm:grid-cols-2">
                                        <div class="rounded-2xl bg-white/8 p-4">
                                            <p class="text-xs uppercase tracking-[0.24em] text-[var(--sand)]">Validación
                                            </p>
                                            <p class="mt-2 text-lg font-semibold">Captura ordenada por etapas</p>
                                        </div>
                                        <div class="rounded-2xl bg-white/8 p-4">
                                            <p class="text-xs uppercase tracking-[0.24em] text-[var(--sand)]">Consulta
                                            </p>
                                            <p class="mt-2 text-lg font-semibold">Información clara para seguimiento</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 rounded-[1.5rem] bg-[var(--paper)] p-5">
                                <img src="{{ asset('images/original.png') }}" alt="Gobierno del Estado de México"
                                    class="w-full rounded-2xl object-contain" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mt-10 grid gap-6 lg:grid-cols-3">
                <article class="feature-card rounded-[1.75rem] p-6 pl-8">
                    <p class="text-xs font-semibold uppercase tracking-[0.3em] text-[var(--wine)]">Registro</p>
                    <h3 class="mt-4 text-2xl font-semibold text-[#1d1915]">Captura con enfoque técnico</h3>
                    <p class="mt-3 text-sm leading-7 text-[#5b534b]">
                        Datos generales, evidencias, condiciones del plantel y estructura del inmueble en una sola ruta
                        de trabajo.
                    </p>
                </article>

                <article class="feature-card rounded-[1.75rem] p-6 pl-8">
                    <p class="text-xs font-semibold uppercase tracking-[0.3em] text-[var(--copper)]">Claridad</p>
                    <h3 class="mt-4 text-2xl font-semibold text-[#1d1915]">Consulta entendible y visual</h3>
                    <p class="mt-3 text-sm leading-7 text-[#5b534b]">
                        La información se organiza para facilitar revisión, seguimiento y toma de decisiones sobre cada
                        plantel registrado.
                    </p>
                </article>

                <article class="feature-card rounded-[1.75rem] p-6 pl-8">
                    <p class="text-xs font-semibold uppercase tracking-[0.3em] text-[var(--gold)]">Confianza</p>
                    <h3 class="mt-4 text-2xl font-semibold text-[#1d1915]">Imagen institucional sobria</h3>
                    <p class="mt-3 text-sm leading-7 text-[#5b534b]">
                        Una interfaz limpia, contemporánea y consistente con la identidad visual oficial del Estado de
                        México.
                    </p>
                </article>
            </section>
        </main>

        <footer class="mt-10 border-t border-[rgba(150,95,54,0.15)] px-1 py-6 text-sm text-[#6a6257]">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <p>IMIFE · Unidad de Tecnologías de la Información</p>
                <p>&copy; {{ date('Y') }} Gobierno del Estado de México. Todos los derechos reservados.</p>
            </div>
        </footer>
    </div>
</body>

</html>
