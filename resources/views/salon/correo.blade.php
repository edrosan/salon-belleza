<head>
  <style>
    .div-correo {
      display: block;
      padding: 1.5rem;
      margin-bottom: 2rem;
      background-color: #ffffff;
      border-radius: 0.5rem;
      border-width: 1px;
      border-color: #E5E7EB;
      box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    }

    .titulo-correo {
      margin-top: 1.5rem;
      color: #111827;
      font-size: 1.875rem;
      line-height: 2.25rem;
      font-weight: 700;
      letter-spacing: -0.025em;
      /* text-align: center; */
    }

    .a-correo {
      display: block;
      padding: 1.5rem;
      margin-bottom: 2rem;
      background-color: #f2dde1;
      border-radius: 0.5rem;
      border-width: 1px;
      border-color: #E5E7EB;
      box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
      max-width: 500px;
    }


    .subtitulo-correo {
      margin-bottom: 0.5rem;
      color: #514347;
      font-size: 1.5rem;
      line-height: 2rem;
      font-weight: 700;
      letter-spacing: -0.025em;
    }

    .texto-correo {
      color: #514347;
      font-weight: 400;
    }
  </style>
</head>

<div class="div-correo">

  <h2 class="titulo-correo">
    {{ $request->nombre}} quiere contactar
  </h2>

  <div class="a-correo">
    <h5 class="subtitulo-correo">
      {{ $request->nombre}} {{ $request->apellidos}}
    </h5>
    <p class="texto-correo">
      {{ $request->email}}
    </p>
    <p class="texto-correo">
      Comentarios:
    </p>

    <p class="texto-correo">
      {{ $request->comentarios}}
    </p>
  </div>
</div>