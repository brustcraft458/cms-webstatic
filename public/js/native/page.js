
// Init
let text = getRandomQuote();
const qEl = document.getElementById("quote");
const qEf = document.getElementById("screen-effect");
let i = 0;

function typeWriter() {
    if (i < text.length) {
        qEl.innerHTML += text.charAt(i);
        i++;
        setTimeout(typeWriter, 60);
    }
}

function getRandomQuote() {
    const quotes = [
        `"Kita pernah berjalan beriringan, namun semesta memilih arah yang berbeda."`,
        `"Aku masih di tempat yang sama, tapi kau tak lagi menoleh ke belakang."`,
        `"Waktu mempertemukan kita, tapi takdir menjadikan kita kenangan."`,
        `"Kita pernah dekat, sekarang hanya sebatas ingatan yang samar."`,
        `"Namamu masih nyaman kusebut, meski tak lagi untuk kupanggil pulang."`,
        `"Langit tahu, rindu ini tak pernah pulang padamu."`,
        `"Ada rindu yang tak bisa diungkap, hanya bisa disimpan dalam doa."`,
        `"Kita pernah satu cerita, kini hanya tinggal paragraf yang tak selesai."`,
        `"Aku belajar melepaskan, walau hati masih ingin menggenggam."`,
        `"Kau pernah jadi alasan aku tersenyum, kini jadi sebuah pelajaran."`,
        `"Jika harus memilih lagi, aku tetap ingin mengenalmu meski harus berakhir."`,
        `"Jarak mengajarkan bahwa cinta tak selalu harus memiliki."`,
        `"Aku belajar merelakan, meski dalam hati masih ingin mempertahankan."`,
        `"Kita adalah kisah yang tak selesai, tapi cukup indah untuk dikenang."`,
        `"Tak semua pertemuan harus diakhiri dengan bersama."`,
        `"Kenangan tentangmu tetap hidup, walau kita tidak lagi bersama."`,
        `"Kita saling menyapa dalam hati, tapi diam di dunia nyata."`,
        `"Jika suatu hari kita bertemu lagi, semoga hanya senyum yang tertinggal."`,
        `"Hati ini masih mengenangmu, meski logika meminta untuk melupakan."`,
        `"Takdir punya cara sendiri untuk menunjukkan bahwa cinta tak harus dimiliki."`,
        `"Semesta mempertemukan kita untuk saling belajar, bukan untuk saling memiliki."`,
        `"Kita pernah saling menatap, tapi dunia tak mengizinkan lebih dari itu."`,
        `"Dalam dunia paralel, mungkin kita bisa bersama. Tapi tidak di sini."`
    ];

    const randomIndex = Math.floor(Math.random() * quotes.length);
    return quotes[randomIndex];
}

// Start
window.onload = typeWriter;

// Local Sakura Effect + Send to WebSocket
document.addEventListener('mousemove', e => {
  const now = Date.now()
  if (!window.last || now - window.last > 40) {
    qEf.style.top = window.scrollY + 'px'
    qEf.style.left = window.scrollX + 'px'

    const s = document.createElement('div')
    s.className = 'mouse-sakura'
    s.style.left = (e.clientX - 15) + 'px'
    s.style.top = (e.clientY - 15) + 'px'
    qEf.appendChild(s)

    const s2 = document.createElement('div')
    s2.className = 'mouse-sakura-blur'
    s2.style.left = (e.clientX - 90) + 'px'
    s2.style.top = (e.clientY - 90) + 'px'
    qEf.appendChild(s2)

    setTimeout(() => { s.remove(); s2.remove() }, 1200)

    // Send to WebSocket
    if (ws.readyState === 1) {
      ws.send(JSON.stringify({
        type: "raw",
        data: {
          pos: { x: e.clientX, y: e.clientY },
          scroll: { x: window.scrollX, y: window.scrollY }
        }
      }))
    }

    window.last = now
  }
})

// Multiplayer WebSocket Setup
let ws = new WebSocket(`${WS_URL}?code=fveon9`)

ws.onopen = () => {
  console.log("✅ WebSocket connected")
}
ws.onerror = e => {
  console.error("❌ WebSocket error", e)
}
ws.onclose = () => {
  console.warn("⚠️ WebSocket closed")
}

// Receive and Render Remote Sakura
ws.onmessage = e => {
  try {
    const msg = JSON.parse(e.data)
    const { pos, scroll } = msg.data || {}

    if (msg.type === "raw" && pos && scroll) {
      const uid = msg.from
      spawnRemoteSakura(pos, scroll, uid)
    }
  } catch (err) {
    console.warn("Invalid message:", e.data)
  }
}

// Remote Sakura Renderer
function spawnRemoteSakura(pos, scroll, uid) {
  let container = document.getElementById(`sakura-ef-${uid}`)
  if (!container) {
    container = document.createElement('div')
    container.className = 'screen-effect'
    container.id = `sakura-ef-${uid}`

    const parrentContainer = document.querySelector(".screen-effect-container") 
    parrentContainer.appendChild(container)
  }

  container.style.top = scroll.y + 'px'
  container.style.left = scroll.x + 'px'
  
  const s = document.createElement('div')
  s.className = 'mouse-sakura'
  s.style.left = (pos.x - 15) + 'px'
  s.style.top = (pos.y - 15) + 'px'
  container.appendChild(s)

  const s2 = document.createElement('div')
  s2.className = 'mouse-sakura-blur'
  s2.style.left = (pos.x - 90) + 'px'
  s2.style.top = (pos.y - 90) + 'px'
  container.appendChild(s2)

  setTimeout(() => { s.remove(); s2.remove() }, 1200)
}
