<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <style>
       
    ..row.g-4 > [class*="col-"] {
    display: flex;
}

.student-card {
    display: flex;
    flex-direction: column;
    height: 100%;
    min-height: 250px;
     position: relative;
     background-color:white;
}

.subject-table-wrapper {
    flex-grow: 1;
    max-height: 200px; 
    overflow-y: auto;
}


.student-actions {
    position: absolute;
    bottom: 10px;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: center;
    gap: 8px;
    padding-top: 10px;
    border-top: 1px solid #444;
    background-color: #212529; /* optional para mag-blend sa bg ng card */
}


   input::placeholder {
        color: white !important;
        opacity: 0.7; 
    }
    .pagination .page-item .page-link {
        background-color: #212529;
        color: white;
        border: 1px solid #343a40;
        margin-bottom:50px;
    }

    .pagination .page-item.active .page-link {
        background-color: #0d6efd;
        border-color: #0d6efd;
        color: white;
    }

    .pagination .page-item .page-link:hover {
        background-color: #343a40;
        color: white;
    }

    </style>

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

   
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

  
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-dark ">
   
    @include('layouts.navigation')

    <div class="container py-4">
        
        @isset($header)
            <div class="bg-gray text-center text-dark shadow p-3 mb-4 rounded">
                {{ $header }}
            </div>
        @endisset

       
        <main>
            @isset($slot)
                {{ $slot }}
            @endisset

            @yield('content') 
        </main>
    </div>

   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#courseSelect').on('change', function() {
                var courseId = $(this).val();
                var subjectSelect = $('#subjectSelect');
                
                subjectSelect.empty(); 
                subjectSelect.append($('<option></option>').val('').text('Select Subject'));

                if(courseId) {
                    var url = "{{ url('courses') }}/" + courseId + "/subjects";

                    $.get(url, function(data) {
                        data.forEach(function(subject) {
                            subjectSelect.append(
                                $('<option></option>').val(subject.id).text(subject.subject_name)
                            );
                        });
                    }).fail(function() {
                        alert('Failed to fetch subjects. Please try again.');
                    });
                }
            });
        });
    
    const filterForm = document.getElementById('filterForm');
    const courseSelect = document.getElementById('course_id');

    courseSelect.addEventListener('change', () => {
        
        document.getElementById('year_section').value = '';
        document.getElementById('subject_id').value = '';
        filterForm.submit();
    });

   
    document.querySelectorAll('#year_section, #subject_id').forEach(select => {
        select.addEventListener('change', () => filterForm.submit());
    });

   
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.querySelector('input[name="search"]');
    if (!searchInput) return;

    let debounceTimer;

    searchInput.addEventListener('input', () => {
        const query = searchInput.value.trim();

        clearTimeout(debounceTimer);

        if (query === '') {
            window.location.href = "{{ route('students.index') }}";
            return;
        }

        debounceTimer = setTimeout(() => {
            searchInput.form.submit();
        }, 5000);
    });

    searchInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            e.preventDefault();
            searchInput.form.submit();
        }
    });
});


</script>


    
</body>
</html>
