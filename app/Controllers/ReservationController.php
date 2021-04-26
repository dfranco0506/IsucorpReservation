<?php namespace App\Controllers;

use App\Models\ContactModel;
use App\Models\ContactTypeModel;
use App\Models\DestinationModel;
use App\Models\ReservationModel;
use Exception;
use Config\Validation;

class ReservationController extends BaseController
{
    public $reservation_model;
    public $contact_type_model;
    public $destination_model;
    /**
     * @var \App\Models\ContactModel
     */
    private $contact_model;

    /**
     * ReservationController constructor.
     */
    public function __construct()
    {
        $this->reservation_model = new ReservationModel();
        $this->contact_type_model = new ContactTypeModel();
        $this->contact_model = new ContactModel();
        $this->destination_model = new DestinationModel();
    }

    public function index()
    {
        helper(['form', 'url']);
        $data['validation'] = \Config\Services::validation();
        return view('reservation_list', $data);
    }

    public function sortByDataTable()
    {
        $limit = $this->request->getPost('length');
        $start = $this->request->getPost('start');
        $sort_by = $this->request->getPost('sort_by');

        $sort_options = $this->getSortOptions($sort_by);
        $reservation_count = $this->reservation_model->getReservationCount();
        $reservations = $this->reservation_model->getReservations($sort_options['col'], $sort_options['dir'], $start, $limit);
        $result = array();

        if (!empty($reservations)) {
            foreach ($reservations as $reservation) {
                $edit_function = 'editItem(' . $reservation->getIdReservation() . ')';
                $edit_favorites = 'editFavorites(' . $reservation->getIdReservation() . ')';
                $edit_rating = 'editRating(' . $reservation->getIdReservation() . ')';
                $nestedData['id_reservation'] = $reservation->getIdReservation();
                $nestedData['image_url'] = '<img class="td-internal-image image-column" src="' . base_url() . '/' . $reservation->getDestination()->getImageUrl() . '" height="50" width="50"/' . '>';
                $nestedData['name'] = '<b>' . $reservation->getDestination()->getName() . '</b><br>' . date('j M Y h:i a', strtotime($reservation->getDate()->format('Y-m-d')));
//                $nestedData['rating'] = '<span class="hidden-favorites"><b>' . 'Raiting' . '</b></span><br>' . $this->starRating($reservation->getDestination()->getRating());
                $nestedData['rating'] = '<span class="hidden-favorites"><b>' . 'Rating' . '</b></span><br><input name="' . $reservation->getIdReservation() . '" value="' . $reservation->getRating() . '" type="number" id="rating" class="rating text-warning image-column" min=0 max=5 step=0.1 data-size="sm" data-stars="5" href="#" >';
                $nestedData['favorite'] = $reservation->getFavorite() == 0 ? '<a style="cursor: pointer" class="table-a"><span class="hidden-favorites" onclick="' . $edit_favorites . '" style="color: grey">Add Favorites  </span><img class="td-internal-image favorite" onclick="' . $edit_favorites . '"src="/img/favorite-heart-icon-disabled.png" height="20" width="20"/><br /></a>' : '<a style="cursor: pointer" class="table-a"><span class="hidden-favorites" onclick="' . $edit_favorites . '" style="color: #212529">Add Favorites  </span><img class="td-internal-image favorite" onclick="' . $edit_favorites . '" src="/img/favorite-heart-icon-active.png" height="20" width="20"/><br /></a>';
                $html = '<div class="table-secondary"><button type="button" onclick="' . $edit_function . '" class="btn rounded-0">EDIT</button></div>';
                $nestedData['actions'] = $html;
                $result[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($this->request->getPost('draw')),
            "recordsTotal" => intval($reservation_count),
            "recordsFiltered" => intval($reservation_count),
            "data" => $result
        );
        echo json_encode($json_data);
    }

    public function favorite($id)
    {
        try {
            $reservation = $this->reservation_model->updateFavorite($id);
            $reservation == true ? session()->setFlashdata('success', lang('Validation.success_add_favorite')) : session()->setFlashdata('success', lang('Validation.success_remove_favorite'));
        } catch (Exception $e) {
            session()->setFlashdata('error', $e->getMessage());
        }
    }

    public function rating()
    {
        try {
            $data = $this->request->getPost();
            $this->reservation_model->updateRating($data);
            session()->setFlashdata('success', lang('Le agradecemos por su evaluación de ' . $data['rating'] . ' puntos'));
        } catch (Exception $e) {
            session()->setFlashdata('error', $e->getMessage());
        }

    }

    public function create()
    {
        session();
        $data['title'] = "Create dreservation";
        $data['contact_types'] = $this->contact_type_model->getAllContactTypes();
        $data['destinations'] = $this->destination_model->getAllDestinations();
        $data['validation'] = \Config\Services::validation();
        return view('reservation_create', $data);
    }

    public function store()
    {
        $postData = $this->request->getPost();
        $validation = [
            'contact_name' => [
                'label' => 'Validation.contact_name',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Validation.contact_name.required'
                ]
            ],
            'contact_type' => [
                'label' => 'Validation.contact_type',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Validation.contact_type.required',
                    'numeric' => 'Validation.contact_phone.required'
                ]
            ],
            'contact_phone' => [
                'label' => 'Validation.contact_phone',
                'rules' => 'required|regex_match[^\d{2}[\s\.-]?\d{4}[\s\.-]?\d{4}$]',
                'errors' => [
                    'required' => 'Validation.contact_phone.required',
                    'regex_match' => 'Validation.contact_phone.phone_valid_format'
                ]
            ],
            'contact_birthday' => [
                'label' => 'Validation.contact_birthday',
                'rules' => 'required|valid_date[d/m/Y]|valid_birthday_date',
                'errors' => [
                    'required' => 'Validation.contact_birthday.required',
                    'valid_birthday_date' => 'Validation.contact_birthday.valid_birthday_date'
                ]
            ],
            'reservation_date' => [
                'label' => 'Validation.reservation_date',
                'rules' => 'required|valid_date[d/m/Y]|valid_reservation_date',
                'errors' => [
                    'required' => 'Validation.reservation_date.required',
                    'valid_reservation_date' => 'Validation.reservation_date.valid_reservation_date'
                ]
            ],
            'reservation_time' => [
                'label' => 'Validation.reservation_time',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Validation.reservation_time.required',
                ]
            ],
        ];
        if ($this->validate($validation)) {

            $contact_data = [
                "contact_name" => $postData['contact_name'],
                "contact_type" => $postData['contact_type'],
                "contact_phone" => $postData['contact_phone'],
                "contact_birthday" => $postData['contact_birthday']
            ];
            try {
                $id_contact = $this->contact_model->addContact($contact_data);
                if (empty($id_contact))
                    session()->setFlashdata('error', lang('Validation.contact_process_fail'));
            } catch (Exception $exception) {
                session()->setFlashdata('error', $exception->getMessage());
            }
            $reservation_data = [
                "contact" => $id_contact,
                "destination" => $postData['destination'],
                "reservation_date" => $postData['reservation_date'],
                "reservation_time" => $postData['reservation_time'],
                "description" => $postData['text_editor']
            ];

            try {
                $this->reservation_model->addReservation($reservation_data);
                session()->setFlashdata('success', lang('Validation.success_create', ['object' => lang('App.reservation')]));
            } catch (Exception $e) {
                session()->setFlashdata('error', $e->getMessage());
            }
            return redirect()->to(base_url('/'));
        }
        return redirect()->route('reservation/create')->withInput();
    }

    public function edit($id)
    {
        helper(['form', 'url']);
        session();
        $data['validation'] = \Config\Services::validation();
        $data['title'] = "Edit Reservation";
        $data['reservations'] = $this->reservation_model->getReservationById($id);
        $data['contact_types'] = $this->contact_type_model->getAllContactTypes();
        $data['destinations'] = $this->destination_model->getAllDestinations();
        $birthday_date = $data['reservations']->getContact()->getBirthDate();
        $data['birthday'] = $birthday_date->format('d/m/Y');
        $reservation_time = $data['reservations']->getTime();
        $reservation_date = $data['reservations']->getDate();
        $data['reservation_date'] = $reservation_date->format('d/m/Y');
        $data['reservation_time'] = $reservation_time->format('H:i:s');
        return view('reservation_edit', $data);
    }

    public function update($id)
    {
        $postData = $this->request->getPost();

        $validation = [
            'reservation_date' => [
                'label' => 'Validation.reservation_date',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Validation.reservation_date.required',
                ]
            ],
            'reservation_time' => [
                'label' => 'Validation.reservation_date',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Validation.reservation_time.required',
                ]
            ],
        ];
        if ($this->validate($validation)) {
            $reservation_data = [
                "destination" => $postData['destination'],
                "reservation_date" => $postData['reservation_date'],
                "reservation_time" => $postData['reservation_time'],
                "description" => $postData['text_editor']
            ];

            try {
                $this->reservation_model->updateReservation($reservation_data, $id);
                session()->setFlashdata('success', lang('Validation.success_update', ['object' => lang('App.reservation')]));
                return redirect()->to(base_url('/'));
            } catch (Exception $e) {
                session()->setFlashdata('error', $e->getMessage());
            }

        }
        return redirect()->to(base_url('reservation/edit/' . $id))->withInput();
    }

}