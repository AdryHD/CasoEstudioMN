$(function () {

    // ── Consultar Casas ──────────────────────────────────────────────────────
    if (document.getElementById("tablaCasas")) {
        new DataTable("#tablaCasas", {
            language: {
                url: "https://cdn.datatables.net/plug-ins/2.3.7/i18n/es-ES.json"
            },
            ordering: false,
            columnDefs: [{ className: "dt-left px-2", targets: "_all" }]
        });
    }

    // ── Alquilar Casa ────────────────────────────────────────────────────────
    if (document.getElementById("formAlquilarCasa")) {

        // Auto-completar precio al seleccionar casa
        $("#IdCasa").on("change", function () {
            var precio = $(this).find(":selected").data("precio");
            if (precio) {
                $("#PrecioCasa").val("₡" + parseFloat(precio).toLocaleString("es-CR", { minimumFractionDigits: 2 }));
            } else {
                $("#PrecioCasa").val("");
            }
        });

        // Validación del formulario
        $("#formAlquilarCasa").validate({
            rules: {
                IdCasa: { required: true },
                UsuarioAlquiler: { required: true }
            },
            messages: {
                IdCasa: { required: "Debe seleccionar una casa" },
                UsuarioAlquiler: { required: "Campo obligatorio" }
            },
            errorElement: "span",
            errorClass: "text-danger",
            highlight: function (element) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function (element) {
                $(element).removeClass("is-invalid");
            },
            submitHandler: function (form) {
                Swal.fire({
                    title: "¿Confirmar alquiler?",
                    text: "¿Desea registrar el alquiler de esta casa?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Sí, alquilar",
                    cancelButtonText: "Cancelar",
                    allowOutsideClick: false,
                    allowEscapeKey: false
                }).then(function (result) {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            }
        });
    }

});
